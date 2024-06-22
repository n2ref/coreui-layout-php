<?php
namespace CoreUI\Layout;


/**
 *
 */
class Size {

    private ?string $direction = null;
    private ?string $justify   = null;
    private ?string $align     = null;
    private ?string $wrap      = null;
    private ?string $fill      = null;


    /**
     * Установка направления flex-элементов в контейнере.
     * @param string|null $direction
     * @return $this
     */
    public function setDirection(string $direction = null): self {

        $this->direction = $direction;
        return $this;
    }


    /**
     * Получение направления flex-элементов в контейнере.
     * @return string|null
     */
    public function getDirection():? string {
        return $this->direction;
    }


    /**
     * Установка выравнивания flex-элементов в контейнере по оси X
     * @param string|null $justify
     * @return $this
     */
    public function setJustify(string $justify = null): self {

        $this->justify = $justify;
        return $this;
    }


    /**
     * Получение выравнивания flex-элементов в контейнере по оси X
     * @return string|null
     */
    public function getJustify():? string {
        return $this->justify;
    }


    /**
     * Установка выравнивания flex-элементов в контейнере по оси Y
     * @param string|null $align
     * @return $this
     */
    public function setAlign(string $align = null): self {

        $this->align = $align;
        return $this;
    }


    /**
     * Получение flex-элементов в контейнере по оси Y
     * @return string|null
     */
    public function getAlign():? string {
        return $this->align;
    }


    /**
     * Установка способа переноса flex-элементов в контейнере
     * @param string|null $wrap
     * @return $this
     */
    public function setWrap(string $wrap = null): self {

        $this->wrap = $wrap;
        return $this;
    }


    /**
     * Получение способа переноса flex-элементов в контейнере
     * @return string|null
     */
    public function getWrap():? string {
        return $this->wrap;
    }


    /**
     * Установка признака заполнения
     * @param bool|null $fill
     * @return $this
     */
    public function setFill(bool $fill = null): self {

        $this->fill = $fill;
        return $this;
    }


    /**
     * Получение признака заполнения
     * @return string|null
     */
    public function getFill():? string {
        return $this->fill;
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