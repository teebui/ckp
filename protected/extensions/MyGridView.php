<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyGridView
 *
 * @author Tuan-Anh Bui
 */
class MyGridView extends CGridView {
    
    public function renderItems()
	{
		if($this->dataProvider->getItemCount()>0 || $this->showTableOnEmpty)
		{
			echo "<table class='table table-striped table-bordered table-highlight'>\n";
			$this->renderTableHeader();
			ob_start();
			$this->renderTableBody();
			$body=ob_get_clean();
			$this->renderTableFooter();
			echo $body; // TFOOT must appear before TBODY according to the standard.
			echo "</table>";
		}
		else
			$this->renderEmptyText();
	}
}

?>
