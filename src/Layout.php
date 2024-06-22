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

    private ?string                     $id         = null;
    private ?string                     $justify    = null;
    private ?string                     $align      = null;
    private ?string                     $direction  = null;
    private ?string                     $wrap       = null;
    private ?string                     $overflow   = null;
    private ?string                     $overflowX  = null;
    private ?string                     $overflowY  = null;
    private string | int | float | null $width      = null;
    private string | int | float | null $width_min  = null;
    private string | int | float | null $width_max  = null;
    private string | int | float | null $height     = null;
    private string | int | float | null $height_min = null;
    private string | int | float | null $height_max = null;
    private string | int | float | null $gap        = null;
    private array                       $items      = [];
    private array                       $sizes      = [];


    /**
     * @param string|null $layout_id
     */
    public function __construct(string $layout_id = null) {

        $this->id = $layout_id ?: crc32(uniqid());
    }


    /**
     * Установка выравнивания flex-элементов в контейнере по оси X
     * @param string|null $justify
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
     */
    public function setAlign(string $align = null): self {

        $this->align = $align;
        return $this;
    }


    /**
     * Получение выравнивания flex-элементов в контейнере по оси Y
     * @return string|null
     */
    public function getAlign():? string {
        return $this->align;
    }


    /**
     * Установка направления flex-элементов в контейнере
     * @param string|null $direction
     */
    public function setDirection(string $direction = null): self {

        $this->direction = $direction;
        return $this;
    }


    /**
     * Получение направления flex-элементов в контейнере
     * @return string|null
     */
    public function getDirection():? string {
        return $this->direction;
    }


    /**
     * Установка способа переноса flex-элементов в контейнере
     * @param string|null $wrap
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
     * Установка способа переполнения элементов в контейнере
     * @param string|null $overflow
     */
    public function setOverflow(string $overflow = null): self {

        $this->overflow = $overflow;
        return $this;
    }


    /**
     * Получение способа переполнения элементов в контейнере
     * @return string|null
     */
    public function getOverflow():? string {
        return $this->overflow;
    }


    /**
     * Установка способа переполнения элементов в контейнере по оси X
     * @param string|null $overflowX
     */
    public function setOverflowX(string $overflowX = null): self {

        $this->overflowX = $overflowX;
        return $this;
    }


    /**
     * Получение способа переполнения элементов в контейнере по оси X
     * @return string|null
     */
    public function getOverflowX():? string {
        return $this->overflowX;
    }


    /**
     * Установка способа переполнения элементов в контейнере по оси Y
     * @param string|null $overflowY
     */
    public function setOverflowY(string $overflowY = null): self {

        $this->overflowY = $overflowY;
        return $this;
    }


    /**
     * Получение способа переполнения элементов в контейнере по оси Y
     * @return string|null
     */
    public function getOverflowY():? string {
        return $this->overflowY;
    }


    /**
     * Установка ширины контейнера в пикселях или других единицах
     * @param string|int|float|null $width
     * @return Layout
     */
    public function setWidth(string|int|float $width = null): self {

        $this->width = $width;
        return $this;
    }


    /**
     * Получение ширины контейнера в пикселях или других единицах
     * @return string|int|float|null
     */
    public function getWidth(): string|int|float|null {
        return $this->width;
    }


    /**
     * Установка минимальной ширины контейнера в пикселях или других единицах
     * @param string|int|float|null $width
     * @return Layout
     */
    public function setWidthMin(string|int|float $width = null): self {

        $this->width_min = $width;
        return $this;
    }


    /**
     * Получение минимальной ширины контейнера в пикселях или других единицах
     * @return string|int|float|null
     */
    public function getWidthMin(): string|int|float|null {
        return $this->width_min;
    }


    /**
     * Установка максимальной ширины контейнера в пикселях или других единицах
     * @param string|int|float|null $width
     * @return Layout
     */
    public function setWidthMax(string|int|float $width = null): self {

        $this->width_max = $width;
        return $this;
    }


    /**
     * Получение максимальной ширины контейнера в пикселях или других единицах
     * @return string|int|float|null
     */
    public function getWidthMax(): string|int|float|null {
        return $this->width_max;
    }


    /**
     * Установка высоты контейнера в пикселях или других единицах
     * @param string|int|float|null $height
     * @return Layout
     */
    public function setHeight(string|int|float $height = null): self {

        $this->height = $height;
        return $this;
    }


    /**
     * Получение высоты контейнера в пикселях или других единицах
     * @return string|int|float|null
     */
    public function getHeight(): string|int|float|null {
        return $this->height;
    }


    /**
     * Установка минимальной высоты контейнера в пикселях или других единицах
     * @param string|int|float|null $height
     * @return Layout
     */
    public function setHeightMin(string|int|float $height = null): self {

        $this->height_min = $height;
        return $this;
    }


    /**
     * Получение минимальной высоты контейнера в пикселях или других единицах
     * @return string|int|float|null
     */
    public function getHeightMin(): string|int|float|null {
        return $this->height_min;
    }



    /**
     * Установка максимальной высоты контейнера в пикселях или других единицах
     * @param string|int|float|null $height
     * @return Layout
     */
    public function setHeightMax(string|int|float $height = null): self {

        $this->height_max = $height;
        return $this;
    }


    /**
     * Получение максимальной высоты контейнера в пикселях или других единицах
     * @return string|int|float|null
     */
    public function getHeightMax(): string|int|float|null {
        return $this->height_max;
    }



    /**
     * Установка отступа между элементами в пикселях или других единицах
     * @param string|int|float|null $gap
     * @return Layout
     */
    public function setGap(string|int|float $gap = null): self {

        $this->gap = $gap;
        return $this;
    }


    /**
     * Получение отступа между элементами в пикселях или других единицах
     * @return string|int|float|null
     */
    public function getGap(): string|int|float|null {
        return $this->gap;
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
     * Получение элементов
     * @return Item[]
     */
    public function getItems(): array {
        return $this->items;
    }


    /**
     * Очистка элементов
     */
    public function clearItems(): void {
        $this->items = [];
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
     * Получение настроек под размер
     * @return Size[]
     */
    public function getSizes(): array {
        return $this->sizes;
    }


    /**
     * Очистка настроек под размер
     */
    public function clearSizes(): void {
        $this->sizes = [];
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
        if ( ! is_null($this->width_min))  {$result['minWidth'] = $this->width_min; }
        if ( ! is_null($this->width_max))  {$result['maxWidth'] = $this->width_max; }
        if ( ! is_null($this->height))    { $result['height']    = $this->height; }
        if ( ! is_null($this->height_max)) {$result['maxHeight'] = $this->height_max; }
        if ( ! is_null($this->height_min)) {$result['minHeight'] = $this->height_min; }
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