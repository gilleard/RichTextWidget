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

	public function getColspan()
	{
		return $this->getSettings()->colspan;
	}

	protected function defineSettings()
	{
		return array(
			'colspan' => array(AttributeType::Number, 'default' => 1, 'required'),
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

		$colspanOptions = array();
		for ($i = 1; $i <= 3; $i++)
		{
			$colspanOptions[] = array('label' => '&nbsp;' . $i, 'value' => $i);
		}

		return craft()->templates->render('richtextwidget/widget-settings', array(
			'colspanOptions' => $colspanOptions,
			'copyInput'      => $copyField->getInputHtml('copy', $this->getSettings()->copy),
			'settings'       => $this->getSettings(),
		));
	}

	public function getBodyHtml()
	{
		return $this->getSettings()->copy;
	}

}
