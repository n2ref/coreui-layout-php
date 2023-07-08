# CoreUI layout

### Composer install

`composer install shabuninil/coreui-layout-php`

### Example usage

```php
    $layout = new \CoreUI\Layout('layout-id');
    
    $layout->justify($layout::JASTIFY_START)
        ->align($layout::ALIGN_START)
        ->direction($layout::DIRECTION_ROW)
        ->wrap($layout::WRAP_WRAP)
        ->overflow($layout::OVERFLOW_AUTO)
        ->overflowX($layout::OVERFLOW_AUTO)
        ->overflowY($layout::OVERFLOW_AUTO)
        ->width(500)
        ->minWidth(400)
        ->maxWidth(600)
        ->height(200)
        ->minHeight(100)
        ->maxHeight(300)
        ->gap(15);
        
    $layout->addSize($layout::SIZE_SM)
        ->direction($layout::DIRECTION_ROW)
        ->justify($layout::JASTIFY_START)
        ->align($layout::ALIGN_END)
        ->wrap($layout::WRAP_WRAP);
       
    
    $item1 = $layout->addItem('id-sidebar')->content('Left')->align($layout::ALIGN_START);
    $item2 = $layout->addItem('id-content')->content('Center')->fill(true);
    $item3 = $layout->addItem('id-right_bar')
        ->content('Right')
        ->align($layout::ALIGN_STRETCH)
        ->order($layout::ORDER_0)
        ->overflow($layout::OVERFLOW_AUTO)
        ->overflowX($layout::OVERFLOW_AUTO)
        ->overflowY($layout::OVERFLOW_AUTO);
        
    $item3->addSize($layout::SIZE_XXL)
        ->align($layout::ALIGN_END)
        ->fill(true)
        ->order($layout::ORDER_2);
    
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