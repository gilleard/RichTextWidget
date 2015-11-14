<?php
namespace Craft;

class RichTextWidget_DashboardWidget extends BaseWidget
{

	public function getName()
	{
		return 'Rich Text';
	}

	public function getTitle()
	{
		return $this->getSettings()->title;
	}

	protected function defineSettings()
	{
		return array(
			'copy'    => array(AttributeType::String),
			'title'   => array(AttributeType::String, 'default' => 'Dashboard Notes'),
		);
	}

	public function getSettingsHtml()
	{
		$copyField = new RichTextFieldType;
		$copyField->setSettings(array(
			'configFile' => craft()->plugins->getPlugin('richtextwidget')->getSettings()->configFile
		));

		return craft()->templates->render('richtextwidget/widget-settings', array(
			'copyInput' => $copyField->getInputHtml('copy', $this->getSettings()->copy),
			'settings'  => $this->getSettings(),
		));
	}

	public function getBodyHtml()
	{
		return '<!-- force show even when html is empty -->' . $this->getSettings()->copy;
	}

}
