<?php
namespace CoreUI\classes;

require_once 'Item/Size.php';


/**
 *
 */
class Item {

    private $id        = '';
    private $align     = null;
    private $fill      = null;
    private $order     = null;
    private $overflow  = null;
    private $overflowX = null;
    private $overflowY = null;
    private $width     = null;
    private $minWidth  = null;
    private $maxWidth  = null;
    private $height    = null;
    private $minHeight = null;
    private $maxHeight = null;
    private $content   = null;
    private $sizes     = [];


    /**
     * @param string|null $id
     */
    public function __construct(string $id = null) {

        if ($id) {
            $this->id = $id;
        } else {
            $this->id = crc32(uniqid());
        }
    }


    /**
     * Выравнивание flex-элемента в контейнере по оси Y
     * @param string|null $align
     */
    public function align(string $align = null): self {

        $this->align = $align;

        return $this;
    }


    /**
     * Элемент с таким признаком будет занимать все доступное горизонтальное пространство
     * @param bool $fill
     * @return Item
     */
    public function fill(bool $fill): self {

        $this->fill = $fill;

        return $this;
    }


    /**
     * Установка визуального порядка для элемента
     * @param int|null $order
     * @return Item
     */
    public function order(int $order = null): self {

        $this->order = $order;

        return $this;
    }


    /**
     * Содержимое внутри элемента. Может быть как текст, так и вложенный объект CoreUI
     * @param string|array|null $content
     * @return Item
     */
    public function content(string|array $content = null): self {

        $this->content = $content;

        return $this;
    }


    /**
     * становка способа переполнения содержимого в элементе
     * @param string|null $overflow
     * @return Item
     */
    public function overflow(string $overflow = null): self {

        $this->overflow = $overflow;

        return $this;
    }


    /**
     * Установка способа переполнения элементов в элементе по оси X
     * @param string|null $overflowX
     * @return Item
     */
    public function overflowX(string $overflowX = null): self {

        $this->overflowX = $overflowX;

        return $this;
    }


    /**
     * Установка способа переполнения элементов в элементе по оси Y
     * @param string|null $overflowY
     * @return Item
     */
    public function overflowY(string $overflowY = null): self {

        $this->overflowY = $overflowY;

        return $this;
    }


    /**
     * Ширина элемента в пикселях или других единицах
     * @param string|int|float|null $width
     * @return Item
     */
    public function width(string|int|float $width = null): self {

        $this->width = $width;

        return $this;
    }


    /**
     * Минимальная ширина элемента в пикселях или других единицах
     * @param string|int|float|null $minWidth
     * @return Item
     */
    public function minWidth(string|int|float $minWidth = null): self {

        $this->minWidth = $minWidth;

        return $this;
    }


    /**
     * Максимальная ширина элемента в пикселях или других единицах
     * @param string|int|float|null $maxWidth
     * @return Item
     */
    public function maxWidth(string|int|float $maxWidth = null): self {

        $this->maxWidth = $maxWidth;

        return $this;
    }


    /**
     * Высота элемента в пикселях или других единицах
     * @param string|int|float|null $height
     * @return Item
     */
    public function height(string|int|float $height = null): self {

        $this->height = $height;

        return $this;
    }


    /**
     * Минимальная высота элемента в пикселях или других единицах
     * @param string|int|float|null $minHeight
     * @return Item
     */
    public function minHeight(string|int|float $minHeight = null): self {

        $this->minHeight = $minHeight;

        return $this;
    }


    /**
     * Минимальная высота элемента в пикселях или других единицах
     * @param string|int|float|null $maxHeight
     * @return Item
     */
    public function maxHeight(string|int|float $maxHeight = null): self {

        $this->maxHeight = $maxHeight;

        return $this;
    }


    /**
     * Добавление настроек под размер
     * @param string $size
     * @return Item\Size
     */
    public function addSize(string $size): Item\Size {

        $size_instance = new Item\Size();

        $this->sizes[$size] = $size_instance;

        return $size_instance;
    }


    /**
     * @return array
     */
    public function toArray(): array {

        $result = [
            'id' => $this->id,
        ];

        if ($this->fill)                  { $result['fill']      = $this->fill; }
        if ( ! is_null($this->align))     { $result['align']     = $this->align; }
        if ( ! is_null($this->order))     { $result['order']     = $this->order; }
        if ( ! is_null($this->overflow))  { $result['overflow']  = $this->overflow; }
        if ( ! is_null($this->overflowX)) { $result['overflowX'] = $this->overflowX; }
        if ( ! is_null($this->overflowY)) { $result['overflowY'] = $this->overflowY; }
        if ( ! is_null($this->width))     { $result['width']     = $this->width; }
        if ( ! is_null($this->minWidth))  { $result['minWidth']  = $this->minWidth; }
        if ( ! is_null($this->maxWidth))  { $result['maxWidth']  = $this->maxWidth; }
        if ( ! is_null($this->height))    { $result['height']    = $this->height; }
        if ( ! is_null($this->minHeight)) { $result['minHeight'] = $this->minHeight; }
        if ( ! is_null($this->maxHeight)) { $result['maxHeight'] = $this->maxHeight; }

        if ($this->sizes) {
            $result['sizes'] = [];

            foreach ($this->sizes as $name => $size) {
                $result['sizes'][$name] = $size->toArray();
            }
        }

        if ( ! is_null($this->content)) {
            $result['content'] = $this->content;
        }

        return $result;
    }
}