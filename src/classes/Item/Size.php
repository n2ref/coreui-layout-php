<?php
namespace CoreUI\classes\Item;


/**
 *
 */
class Size {

    private $align = null;
    private $order = null;
    private $fill  = false;


    /**
     * Выравнивание flex-элемента в контейнере по оси Y
     * @param string|null $align
     * @return $this
     */
    public function align(string $align = null): self {

        $this->align = $align;
        return $this;
    }


    /**
     * Установка визуального порядка для элемента
     * @param int|null $order
     * @return $this
     */
    public function order(int $order = null): self {

        $this->order = $order;
        return $this;
    }


    /**
     * Элемент с таким признаком будет занимать все доступное горизонтальное пространство
     * @param bool $fill
     * @return $this
     */
    public function fill(bool $fill): self {

        $this->fill = $fill;
        return $this;
    }


    /**
     * @return array
     */
    public function toArray(): array {

        $result = [];

        if ( ! is_null($this->order)) { $result['order'] = $this->order; }
        if ( ! is_null($this->align)) { $result['align'] = $this->align; }
        if ( ! is_null($this->fill))  { $result['fill']  = $this->fill; }

        return $result;
    }
}