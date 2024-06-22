<?php
namespace CoreUI\Layout\Item;


/**
 *
 */
class Size {

    private ?string $align       = null;
    private ?int $order       = null;
    private ?bool   $fill        = false;
    private ?int    $widthColumn = 0;


    /**
     * Установка выравнивания flex-элемента в контейнере по оси Y
     * @param string|null $align
     * @return $this
     */
    public function setAlign(string $align = null): self {

        $this->align = $align;
        return $this;
    }


    /**
     * Получение выравнивания flex-элемента в контейнере по оси Y
     * @return string|null
     */
    public function getAlign():? string {
        return $this->align;
    }


    /**
     * Установка визуального порядка для элемента
     * @param int|null $order
     * @return $this
     */
    public function setOrder(int $order = null): self {

        $this->order = $order;
        return $this;
    }


    /**
     * Получение визуального порядка для элемента
     * @return int|null
     */
    public function getOrder():? int {
        return $this->order;
    }


    /**
     * Установка признака для занятия всего доступного горизонтального пространства
     * @param bool $fill
     * @return $this
     */
    public function setFill(bool $fill): self {

        $this->fill = $fill;
        return $this;
    }


    /**
     * Получение признака для занятия всего доступного горизонтального пространства
     * @return bool|null
     */
    public function getFill():? bool {
        return $this->fill;
    }


    /**
     * Установка ширины в количестве колонок
     * @param int $column
     * @return $this
     */
    public function setWidthColumn(int $column): self {

        $this->widthColumn = $column;
        return $this;
    }


    /**
     * Получение ширины в количестве колонок
     * @return int|null
     */
    public function getWidthColumn():? int {
        return $this->widthColumn;
    }


    /**
     * @return array
     */
    public function toArray(): array {

        $result = [];

        if ( ! is_null($this->order)) { $result['order']       = $this->order; }
        if ( ! is_null($this->align)) { $result['align']       = $this->align; }
        if ( ! is_null($this->fill))  { $result['fill']        = $this->fill; }
        if ($this->widthColumn > 0)   { $result['widthColumn'] = $this->widthColumn; }

        return $result;
    }
}