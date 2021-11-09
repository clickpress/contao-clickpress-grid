[![Version](http://img.shields.io/packagist/v/clickpress/contao-clickpress-grid.svg?style=flat-square)](https://packagist.org/packages/clickpress/contao-clickpress-grid)  [![GitHub license](https://img.shields.io/badge/license-GPL-blue.svg?style=flat-square)](https://raw.githubusercontent.com/clickpress/contao-clickpress-grid/master/LICENSE)
# Grid CSS for Contao

Add columns to your page content.

Contao Clickpress Grid uses [CSS Grid](https://css-tricks.com/snippets/css/complete-guide-grid/) and so less HTML is needed.

## Installation
```console
composer require clickpress/contao-clickpress-grid
```
or use the Contao Manager.

## Usage
1. Enable the prebuilt CSS Grid in your Contao page layout or generate your own CSS.
2. Add a new content element from type "Gridset start" - "Gridset end" will be autogenerated
3. Edit your column configuration in the "Gridset start" content element
4. Place some elements between "Gridset start" and "Gridset end".

If you need two content elements in a column, wrap them between the elements "Column start" and "Column end".

## Customized CSS
If you want to customize your grid CSS follow these steps:
1. Disable "Load Clickpress Grid CSS" in your page layout settings.
2. Copy and edit the grid CSS (https://github.com/clickpress/contao-clickpress-grid/blob/main/src/Resources/public/clickpress-grid.scss)
3. Add your new grid CSS to the page layout as "external CSS"

## Inside
This is the result of a 40% 30% 30% setting on desktop. So, three columns will be displayed in a row. The fourth column will be placed in a new row, automatically.
```html
<div class="grid_desktop_40_30_30 ...">
   <div class="ce_text">...</div>
   <div class="ce_text">...</div>
   <div class="ce_image">...</div>
   <div class="ce_text">...</div>
   <div class="ce_text">...</div>
</div>
```

## Credits
Big thanks to [rocksolid_columns](https://github.com/madeyourday/contao-rocksolid-columns) for some parts of the module.
