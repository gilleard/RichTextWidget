<?php
namespace Craft;

class RichTextWidgetPlugin extends BasePlugin
{

	public function getName()
	{
		 return 'Rich Text Widget';
	}

	public function getVersion()
	{
		return '0.1.0';
	}

	public function getDeveloper()
	{
		return 'Adam Gilleard';
	}

	public function getDeveloperUrl()
	{
		return 'http://adamgilleard.co.uk';
	}

	protected function defineSettings()
	{
		return array(
			'configFile' => array(AttributeType::String, 'required')
		);
	}

	public function getSettingsHtml()
	{
		$configOptions = array('' => Craft::t('Default'));
		$configPath    = craft()->path->getConfigPath().'redactor/';

		if (IOHelper::folderExists($configPath))
		{
			$configFiles = IOHelper::getFolderContents($configPath, false, '\.json$');

			if (is_array($configFiles))
			{
				foreach ($configFiles as $file)
				{
					$configOptions[IOHelper::getFileName($file)] = IOHelper::getFileName($file, false);
				}
			}
		}

		return craft()->templates->render('richtextwidget/settings', array(
			'configOptions' => $configOptions,
			'settings'      => $this->getSettings(),
		));
	}

}
