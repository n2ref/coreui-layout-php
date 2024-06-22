<?php
namespace CoreUI\Layout;

require_once 'Item/Size.php';


/**
 *
 */
class Item {

    private ?string                     $id          = '';
    private ?string                     $align       = null;
    private ?bool                       $fill        = null;
    private ?string                     $order       = null;
    private ?string                     $overflow    = null;
    private ?string                     $overflowX   = null;
    private ?string                     $overflowY   = null;
    private string | int | float | null $width       = null;
    private string | int | float | null $width_min   = null;
    private string | int | float | null $width_max   = null;
    private string | int | float | null $height      = null;
    private string | int | float | null $height_min  = null;
    private string | int | float | null $height_max  = null;
    private string | array | null       $content     = null;
    private ?int                        $widthColumn = null;
    private array                       $sizes       = [];


    /**
     * @param string|null $id
     */
    public function __construct(string $id = null) {

        $this->id = $id ?: crc32(uniqid());
    }


    /**
     * Установка выравнивания flex-элемента в контейнере по оси Y
     * @param string|null $align
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
     * Установка признака для занятия всего доступного горизонтального пространства
     * @param bool $fill
     * @return Item
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
     * Установка визуального порядка для элемента
     * @param int|null $order
     * @return Item
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
     * Установка содержимого внутри элемента. Может быть как текст, так и вложенный объект CoreUI
     * @param string|array|null $content
     * @return Item
     */
    public function setContent(string|array $content = null): self {

        $this->content = $content;
        return $this;
    }


    /**
     * Получение содержимого внутри элемента. Может быть как текст, так и вложенный объект CoreUI
     * @return string|array|null
     */
    public function getContent(): string|array|null {
        return $this->content;
    }


    /**
     * Установка способа переполнения содержимого в элементе
     * @param string|null $overflow
     * @return Item
     */
    public function setOverflow(string $overflow = null): self {

        $this->overflow = $overflow;
        return $this;
    }


    /**
     * Получение способа переполнения содержимого в элементе
     * @return string|null
     */
    public function getOverflow():? string {
        return $this->overflow;
    }


    /**
     * Установка ширины элемента в колонках
     * @param int $column
     * @return Item
     */
    public function setWidthColumn(int $column): self {

        $this->widthColumn = $column;
        return $this;
    }


    /**
     * Получение ширины элемента в колонках
     * @return int|null
     */
    public function getWidthColumn():? int {
        return $this->widthColumn;
    }


    /**
     * Установка способа переполнения элементов в элементе по оси X
     * @param string|null $overflowX
     * @return Item
     */
    public function setOverflowX(string $overflowX = null): self {

        $this->overflowX = $overflowX;
        return $this;
    }


    /**
     * Получение способа переполнения элементов в элементе по оси X
     * @return string|null
     */
    public function getOverflowX():? string {
        return $this->overflowX;
    }


    /**
     * Установка способа переполнения элементов в элементе по оси Y
     * @param string|null $overflowY
     * @return Item
     */
    public function setOverflowY(string $overflowY = null): self {

        $this->overflowY = $overflowY;
        return $this;
    }


    /**
     * Получение способа переполнения элементов в элементе по оси Y
     * @return string|null
     */
    public function getOverflowY():? string {
        return $this->overflowY;
    }


    /**
     * Установка ширины элемента в пикселях или других единицах
     * @param string|int|float|null $width
     * @return Item
     */
    public function setWidth(string|int|float $width = null): self {

        $this->width = $width;
        return $this;
    }


    /**
     * Получение ширины элемента в пикселях или других единицах
     * @return string|int|float|null
     */
    public function getWidth(): string|int|float|null {
        return $this->width;
    }


    /**
     * Установка минимальной ширины элемента в пикселях или других единицах
     * @param string|int|float|null $width
     * @return Item
     */
    public function setWidthMin(string|int|float $width = null): self {

        $this->width_min = $width;
        return $this;
    }


    /**
     * Получение минимальной ширины элемента в пикселях или других единицах
     * @return string|int|float|null
     */
    public function getWidthMin(): string|int|float|null {
        return $this->width_min;
    }


    /**
     * Установка максимальной ширина элемента в пикселях или других единицах
     * @param string|int|float|null $width
     * @return Item
     */
    public function setWidthMax(string|int|float $width = null): self {

        $this->width_max = $width;
        return $this;
    }


    /**
     * Получение максимальной ширины элемента в пикселях или других единицах
     * @return string|int|float|null
     */
    public function getWidthMax(): string|int|float|null {
        return $this->width_max;
    }


    /**
     * Установка высоты элемента в пикселях или других единицах
     * @param string|int|float|null $height
     * @return Item
     */
    public function setHeight(string|int|float $height = null): self {

        $this->height = $height;
        return $this;
    }


    /**
     * Получение высоты элемента в пикселях или других единицах
     * @return string|int|float|null
     */
    public function getHeight(): string|int|float|null {
        return $this->height;
    }


    /**
     * Установка минимальной высоты элемента в пикселях или других единицах
     * @param string|int|float|null $height
     * @return Item
     */
    public function setHeightMin(string|int|float $height = null): self {

        $this->height_min = $height;
        return $this;
    }


    /**
     * Получение минимальной высоты элемента в пикселях или других единицах
     * @return string|int|float|null
     */
    public function getHeightMin(): string|int|float|null {
        return $this->height_min;
    }


    /**
     * Установка минимальной высоты элемента в пикселях или других единицах
     * @param string|int|float|null $height
     * @return Item
     */
    public function setHeightMax(string|int|float $height = null): self {

        $this->height_max = $height;
        return $this;
    }


    /**
     * Получение минимальной высоты элемента в пикселях или других единицах
     * @return string|int|float|null
     */
    public function getHeightMax(): string|int|float|null {
        return $this->height_max;
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
     * Получение настроек под размер
     * @return Item\Size[]
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
     * @return array
     */
    public function toArray(): array {

        $result = [
            'id' => $this->id,
        ];

        if ($this->fill)                  { $result['fill']        = $this->fill; }
        if ( ! is_null($this->align))     { $result['align']       = $this->align; }
        if ( ! is_null($this->order))     { $result['order']       = $this->order; }
        if ( ! is_null($this->overflow))  { $result['overflow']    = $this->overflow; }
        if ( ! is_null($this->overflowX)) { $result['overflowX']   = $this->overflowX; }
        if ( ! is_null($this->overflowY)) { $result['overflowY']   = $this->overflowY; }
        if ( ! is_null($this->width))     { $result['width']       = $this->width; }
        if ( ! is_null($this->width_min))  {$result['minWidth'] = $this->width_min; }
        if ( ! is_null($this->width_max))  {$result['maxWidth'] = $this->width_max; }
        if ( ! is_null($this->height))    { $result['height']      = $this->height; }
        if ( ! is_null($this->height_min)) {$result['minHeight'] = $this->height_min; }
        if ( ! is_null($this->height_max)) {$result['maxHeight'] = $this->height_max; }
        if ($this->widthColumn > 0)       { $result['widthColumn'] = $this->widthColumn; }

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