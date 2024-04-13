<?php
namespace CoreUI;
use CoreUI\Layout\Item;
use CoreUI\Layout\Size;


require_once 'Layout/Item.php';
require_once 'Layout/Size.php';


/**
 *
 */
class Layout {

    const JUSTIFY_START   = 'start';
    const JUSTIFY_END     = 'end';
    const JUSTIFY_CENTER  = 'center';
    const JUSTIFY_BETWEEN = 'between';
    const JUSTIFY_AROUND  = 'around';
    const JUSTIFY_EVENLY  = 'evenly';

    const ALIGN_START    = 'start';
    const ALIGN_END      = 'end';
    const ALIGN_CENTER   = 'center';
    const ALIGN_BASELINE = 'baseline';
    const ALIGN_STRETCH  = 'stretch';

    const DIRECTION_ROW            = 'row';
    const DIRECTION_ROW_REVERSE    = 'row-reverse';
    const DIRECTION_COLUMN         = 'column';
    const DIRECTION_COLUMN_REVERSE = 'column-reverse';

    const WRAP_WRAP         = 'wrap';
    const WRAP_WRAP_REVERSE = 'wrap-reverse';
    const NOWRAP            = 'nowrap';

    const OVERFLOW_AUTO    = 'auto';
    const OVERFLOW_HIDDEN  = 'hidden';
    const OVERFLOW_VISIBLE = 'visible';
    const OVERFLOW_SCROLL  = 'scroll';

    const SIZE_SM  = 'sm';
    const SIZE_MD  = 'md';
    const SIZE_LG  = 'lg';
    const SIZE_XL  = 'xl';
    const SIZE_XXL = 'xxl';

    const ORDER_0 = 0;
    const ORDER_1 = 1;
    const ORDER_2 = 2;
    const ORDER_3 = 3;
    const ORDER_4 = 4;
    const ORDER_5 = 5;

    private $id        = null;
    private $justify   = null;
    private $align     = null;
    private $direction = null;
    private $wrap      = null;
    private $overflow  = null;
    private $overflowX = null;
    private $overflowY = null;
    private $width     = null;
    private $minWidth  = null;
    private $maxWidth  = null;
    private $height    = null;
    private $minHeight = null;
    private $maxHeight = null;
    private $gap       = null;
    private $items     = [];
    private $sizes     = [];


    /**
     * @param string|null $layout_id
     */
    public function __construct(string $layout_id = null) {

        if ($layout_id) {
            $this->id = $layout_id;
        } else {
            $this->id = crc32(uniqid());
        }
    }


    /**
     * Выравнивание flex-элементов в контейнере по оси X
     * @param string|null $justify
     */
    public function justify(string $justify = null): self {

        $this->justify = $justify;

        return $this;
    }


    /**
     * Выравнивание flex-элементов в контейнере по оси Y
     * @param string|null $align
     */
    public function align(string $align = null): self {

        $this->align = $align;

        return $this;
    }


    /**
     * Установка направления flex-элементов в контейнере
     * @param string|null $direction
     */
    public function direction(string $direction = null): self {

        $this->direction = $direction;

        return $this;
    }


    /**
     * Установка способа переноса flex-элементов в контейнере
     * @param string|null $wrap
     */
    public function wrap(string $wrap = null): self {

        $this->wrap = $wrap;

        return $this;
    }


    /**
     * Установка способа переполнения элементов в контейнере
     * @param string|null $overflow
     */
    public function overflow(string $overflow = null): self {

        $this->overflow = $overflow;

        return $this;
    }


    /**
     * Установка способа переполнения элементов в контейнере по оси X
     * @param string|null $overflowX
     */
    public function overflowX(string $overflowX = null): self {

        $this->overflowX = $overflowX;

        return $this;
    }


    /**
     * Установка способа переполнения элементов в контейнере по оси Y
     * @param string|null $overflowY
     */
    public function overflowY(string $overflowY = null): self {

        $this->overflowY = $overflowY;

        return $this;
    }


    /**
     * Ширина контейнера в пикселях или других единицах
     * @param string|int|float|null $width
     * @return Layout
     */
    public function width(string|int|float $width = null): self {

        $this->width = $width;

        return $this;
    }


    /**
     * Минимальная ширина контейнера в пикселях или других единицах
     * @param string|int|float|null $minWidth
     * @return Layout
     */
    public function minWidth(string|int|float $minWidth = null): self {

        $this->minWidth = $minWidth;

        return $this;
    }


    /**
     * Максимальная ширина контейнера в пикселях или других единицах
     * @param string|int|float|null $maxWidth
     * @return Layout
     */
    public function maxWidth(string|int|float $maxWidth = null): self {

        $this->maxWidth = $maxWidth;

        return $this;
    }


    /**
     * Высота контейнера в пикселях или других единицах
     * @param string|int|float|null $height
     * @return Layout
     */
    public function height(string|int|float $height = null): self {

        $this->height = $height;

        return $this;
    }


    /**
     * Минимальная высота контейнера в пикселях или других единицах
     * @param string|int|float|null $minHeight
     * @return Layout
     */
    public function minHeight(string|int|float $minHeight = null): self {

        $this->minHeight = $minHeight;

        return $this;
    }



    /**
     * Минимальная высота контейнера в пикселях или других единицах
     * @param string|int|float|null $maxHeight
     * @return Layout
     */
    public function maxHeight(string|int|float $maxHeight = null): self {

        $this->maxHeight = $maxHeight;

        return $this;
    }



    /**
     * Отступ между элементами в пикселях или других единицах
     * @param string|int|float|null $gap
     * @return Layout
     */
    public function gap(string|int|float $gap = null): self {

        $this->gap = $gap;

        return $this;
    }


    /**
     * Добавление элемента
     * @param string|null $id
     * @return Item
     */
    public function addItems(string $id = null): Item {

        $item = new Item($id);

        $this->items[] = $item;

        return $item;
    }


    /**
     * Добавление настроек под размер
     * @param string $size
     * @return Size
     */
    public function addSize(string $size): Size {

        $size_instance = new Size();

        $this->sizes[$size] = $size_instance;

        return $size_instance;
    }


    /**
     * Формирует данные
     * @return array
     */
    public function toArray(): array {

        $result = [
            'component' => 'coreui.layout',
            'id'        => $this->id,
        ];

        if ( ! is_null($this->justify))   { $result['justify']   = $this->justify; }
        if ( ! is_null($this->align))     { $result['align']     = $this->align; }
        if ( ! is_null($this->direction)) { $result['direction'] = $this->direction; }
        if ( ! is_null($this->wrap))      { $result['wrap']      = $this->wrap; }
        if ( ! is_null($this->overflow))  { $result['overflow']  = $this->overflow; }
        if ( ! is_null($this->overflowX)) { $result['overflowX'] = $this->overflowX; }
        if ( ! is_null($this->overflowY)) { $result['overflowY'] = $this->overflowY; }
        if ( ! is_null($this->width))     { $result['width']     = $this->width; }
        if ( ! is_null($this->minWidth))  { $result['minWidth']  = $this->minWidth; }
        if ( ! is_null($this->maxWidth))  { $result['maxWidth']  = $this->maxWidth; }
        if ( ! is_null($this->height))    { $result['height']    = $this->height; }
        if ( ! is_null($this->maxHeight)) { $result['maxHeight'] = $this->maxHeight; }
        if ( ! is_null($this->minHeight)) { $result['minHeight'] = $this->minHeight; }
        if ( ! is_null($this->gap))       { $result['gap']       = $this->gap; }


        if ($this->sizes) {
            $result['sizes'] = [];

            foreach ($this->sizes as $name => $size) {
                $result['sizes'][$name] = $size->toArray();
            }
        }

        if ($this->items) {
            $result['items'] = [];

            foreach ($this->items as $item) {
                $result['items'][] = $item->toArray();
            }
        }

        return $result;
    }
} 