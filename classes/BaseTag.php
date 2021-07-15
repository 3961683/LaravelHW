<?php
namespace App;

use App\Contracts\TagContract;

use App\Traits\BootTraits;
use App\Traits\HasAttributes;
use App\Traits\HasBody;
use App\Traits\HasName;
use JetBrains\PhpStorm\Pure;

abstract class BaseTag implements TagContract
{
    use BootTraits, HasName, HasAttributes, HasBody;

    function __construct(string $name, array $attrs = []) {
        $this->bootTraits($name, $attrs); # will invoke traits
    }

    function appendTo(BaseTag $tag): static
    {
        $tag->append($this);
        return $this;
    }

    function prependTo(BaseTag $tag): static
    {
        $tag->prepend($this);
        return $this;
    }

    //region .class home work
    private function filterClassName(string $class): string {
        $filtered = '';

        for($i = 0; $i < strlen($class); $i++){
            $filtered .= ($class[$i] != ' ') ? $class[$i] : '';
        }

        return $filtered;
    }

    public function addClass(string $class) {
        $class = $this->filterClassName($class);
        if(!$this->classTagExists())
            throw new \LogicException("you haven't attribute class");

        if ($this->classExists($class))
            return $this;

        $tag = $this->attributes()->get('class');
        $l_classes = explode(' ', $tag);
        $l_classes[] = $class;

        $this->attributes()->set('class', implode(' ', $l_classes));
        return $this;
    }

    private function classTagExists(): bool{
        $attrs = $this->attributes()->getAll();
        return key_exists('class', $attrs);
    }

    public function classExists(string $class): bool {
        $tag = $this->attributes()->get('class');
        $l_classes = explode(' ', $tag);

        return in_array($class, $l_classes);
    }

    public function removeClass(string $class) {
        $class = $this->filterClassName($class);

        if(!$this->classTagExists())
            throw new \LogicException("you haven't attribute class");

        $tag = $this->attributes()->get('class');
        $l_classes = explode(' ', $tag);
        unset($l_classes[array_search($class, $l_classes)]);

        $this->attributes()->set('class', implode(' ', $l_classes));
        return $this;
    }
    //endregion

    function toString(): string {
        $name = $this->name();
        $attrs = $this->attributes();
        $body = $this->body();

        $tag = "<{$name}{$attrs}";

        if ($this->isSelfClosing())
            return "$tag />";

        return "{$tag}>{$body}</{$name}>";
    }

    function __toString(): string {
        return $this->toString();
    }
}