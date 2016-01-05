# Rich Text Widget for Craft

A "Rich Text" widget type for the Craft dashboard, allows you to easily add some notes and links to the dashboard.

## Installation

1. Upload the `richtextwidget` folder to your `craft/plugins` folder.
2. Go to Settings > Plugins from your Craft control panel and enable the Rich Text Widget plugin.
3. From the plugin's settings page you can choose the Redactor config you'd like to use. `Widget.json` is provided with some sensible defaults, this will need copying to your `craft/config/redactor` folder.

## Known Issues

- The text field won't show initially due to a Craft bug, for now just initially save the field then edit it again via the settings icon in the top right.
