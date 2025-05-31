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
1. Enable the built-in CSS grid in your Contao page layout settings or create your own custom CSS.
2. Add a new content element of type "Gridset Start". The corresponding "Gridset End" will be added automatically.
3. Configure your column settings in the "Gridset Start" element.
4. Place your desired content elements between the "Gridset Start" and "Gridset End" elements.

If you need multiple content elements within a single column, wrap them with "Column Start" and "Column End" elements.

## Customized CSS
To override the default grid styles:
1. Uncheck "Load Clickpress Grid CSS" in the page layout settings.
2. Copy and customize the clickpress-grid.scss file (https://github.com/clickpress/contao-clickpress-grid/blob/main/public/clickpress-grid.scss)
3. Include your custom CSS as an external stylesheet in the layout settings.

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
