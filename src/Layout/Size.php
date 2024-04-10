<?php
namespace CoreUI\Layout;


/**
 *
 */
class Size {

    private $direction = null;
    private $justify   = null;
    private $align     = null;
    private $wrap      = null;
    private $fill      = null;


    /**
     * Установка направления flex-элементов в контейнере.
     * @param string|null $direction
     * @return $this
     */
    public function direction(string $direction = null): self {

        $this->direction = $direction;
        return $this;
    }


    /**
     * Выравнивание flex-элементов в контейнере по оси X
     * @param string|null $justify
     * @return $this
     */
    public function justify(string $justify = null): self {

        $this->justify = $justify;
        return $this;
    }


    /**
     * Выравнивание flex-элементов в контейнере по оси Y
     * @param string|null $align
     * @return $this
     */
    public function align(string $align = null): self {

        $this->align = $align;
        return $this;
    }


    /**
     * Установка способа переноса flex-элементов в контейнере
     * @param string|null $wrap
     * @return $this
     */
    public function wrap(string $wrap = null): self {

        $this->wrap = $wrap;
        return $this;
    }


    /**
     * Установка признака заполнения
     * @param bool|null $fill
     * @return $this
     */
    public function fill(bool $fill = null): self {

        $this->fill = $fill;
        return $this;
    }


    /**
     * @return array
     */
    public function toArray(): array {

        $result = [];

        if ( ! is_null($this->direction)) { $result['direction'] = $this->direction; }
        if ( ! is_null($this->justify))   { $result['justify']   = $this->justify; }
        if ( ! is_null($this->align))     { $result['align']     = $this->align; }
        if ( ! is_null($this->wrap))      { $result['wrap']      = $this->wrap; }
        if ( ! is_null($this->fill))      { $result['fill']      = $this->fill; }

        return $result;
    }
}