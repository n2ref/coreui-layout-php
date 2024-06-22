# CoreUI layout

### Composer install

`composer install n2ref/coreui-layout-php`

### Example usage

```php
    $layout = new \CoreUI\Layout('layout-id');
    
    $layout->setJustify($layout::JASTIFY_START)
        ->setAlign($layout::ALIGN_START)
        ->setDirection($layout::DIRECTION_ROW)
        ->setWrap($layout::WRAP_WRAP)
        ->setOverflow($layout::OVERFLOW_AUTO)
        ->setOverflowX($layout::OVERFLOW_AUTO)
        ->setOverflowY($layout::OVERFLOW_AUTO)
        ->setWidth(500)
        ->setWidthMin(400)
        ->setWidthMax(600)
        ->setHeight(200)
        ->setHeightMin(100)
        ->setHeightMax(300)
        ->setGap(15);
        
    $layout->addSize($layout::SIZE_SM)
        ->setDirection($layout::DIRECTION_ROW)
        ->setJustify($layout::JASTIFY_START)
        ->setAlign($layout::ALIGN_END)
        ->setWrap($layout::WRAP_WRAP);
       
    
    $item1 = $layout->addItem('id-sidebar')->setContent('Left')->setAlign($layout::ALIGN_START);
    $item2 = $layout->addItem('id-content')->setContent('Center')->setFill(true);
    $item3 = $layout->addItem('id-right_bar')
        ->setContent('Right')
        ->setAlign($layout::ALIGN_STRETCH)
        ->setOrder($layout::ORDER_0)
        ->setOverflow($layout::OVERFLOW_AUTO)
        ->setOverflowX($layout::OVERFLOW_AUTO)
        ->setOverflowY($layout::OVERFLOW_AUTO);
        
    $item3->addSize($layout::SIZE_XXL)
        ->setAlign($layout::ALIGN_END)
        ->setFill(true)
        ->setOrder($layout::ORDER_2);
    
    echo json_encode($layout->toArray());
```

Output 
```json
{
    "component": "coreui.layout",
    "id": "layout-id",
    "justify": "start",
    "align": "start",
    "direction": "row",
    "wrap": "wrap",
    "overflow" : "auto",
    "overflowX" : "auto",
    "overflowY" : "auto",
    "width": 500,
    "minWidth": 400,
    "maxWidth": 600,
    "height": 200,
    "minHeight": 100,
    "maxHeight": 300,
    "gap": 15,
    "sizes": {
      "sm": {
        "direction": "row",
        "justify": "start",
        "align": "start",
        "wrap": "wrap"
      }
    },
    "items": [
      { "id": "id-sidebar", "content": "Left",   "align": "start" },
      { "id": "id-content", "content": "Center", "fill": true },
      {
        "id": "id-right_bar",
        "align": "stretch",
        "content": "Right",
        "order": 0,
        "overflow" : "auto",
        "overflowX" : "auto",
        "overflowY" : "auto",
        "sizes": {
          "xxl": {
            "align": "end",
            "fill": true,
            "order": 2,
            "col": 0
          }
        }
      }
    ]
}
```