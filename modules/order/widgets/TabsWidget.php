<?php

namespace app\modules\order\widgets;

use Yii;
use yii\base\Widget;

class TabsWidget extends Widget
{
    /** @var string */
    public $column;

    /** @var string */
    public $rootTitle;

    /** @var array */
    public $tabs;

    /** @var int|null */
    private $activeTabIndex = null;

    public function init()
    {
        parent::init();
        $this->setActiveTabIndex();
    }

    /**
     * @inheritDoc
     */
    public function run()
    {
        if ($this->rootTitle) {
            echo '<li ' . $this->getActiveClass() . '>
                    <a href="/">' . $this->rootTitle . '</a>
                  </li>';
        }
        foreach ($this->tabs as $index => $tab) {
            $columnValue = $tab['value'];
            $title = $tab['title'];
            $href = '/?' . $this->column . '=' . $columnValue;
            echo '<li ' . $this->getActiveClass($index) . '>
                    <a href="' . $href . '">' . $title. '</a>
                  </li>';
        }
    }

    /**
     * @param int|null $tabIndex
     * @return string
     */
    private function getActiveClass(int $tabIndex = null): string
    {
        if (is_null($tabIndex) && is_null($this->activeTabIndex)) {
            return 'class = "active"';
        }
        return $tabIndex === $this->activeTabIndex ? 'class = "active"' : '';
    }

    private function setActiveTabIndex(): void
    {
        $currentQueryParams = Yii::$app->request->queryParams;
        foreach ($this->tabs as $index => $tab) {
            if (isset($currentQueryParams[$this->column]) &&
                (string)$currentQueryParams[$this->column] === (string)$tab['value']
            ) {
                $this->activeTabIndex = $index;
            }
        }
    }

}