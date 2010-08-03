<?php
/**
 * EChmHhcFile class file.
 *
 * @author Veaceslav Medvedev <slavcopost@gmail.com>
 * @link http://code.google.com/p/yiiext/
 * @license http://www.opensource.org/licenses/mit-license.php
 */

/**
 * EChmHhcFile.
 *
 * @author Veaceslav Medvedev <slavcopost@gmail.com>
 * @version 0.1
 * @package yiiext.components.chm
 */
class EChmHhcFile extends EChmFile
{
	public $frameName;		// This is used where the topics should open in a specific HTML frame.
	public $windowName;		// This is used where the topics should open in a specific window.
	public $imageList;		// Path of a BMP that stores multiple images of the same size in a horizontal array.
	public $imageWidth;		// The width of the images in the ImageList file. HHW is buggy with respect to this;
							// it ignores what is in the file, only ever displays 20 in the GUI and preserves the value in the file.
	public $colorMask;		// Only output by FAR. Has an effect on Foreground & Background colours. Unknown.
	public $background;		// Colour of the background of the TOC window. White default. In hex format.
	public $foreground;		// Colour of the text of the TOC window (window & page names). Black default. In hex format.
	public $styles;			// Win32 window style DWORD. In hex format.
	public $extStyles;		// Win32 extended window style DWORD. In hex format.
	public $imageType;		// When using standard images (ImageList is not present), causes different icons to be used.
							// Normally headings use a book icon & pages have a page icon with a question mark on it.
							// If this property is "Folder" then headings will use a Folder icon and pages will have a page icon with horizontal lines on it.
	public $font;			// Font name, font size, character set.
	public $autoGenerated;	// Output when the HHC has been automatically generated by HHW during the compilation process when Auto TOC is present in the HHP.

    protected $_items=array();

    public function addItem($config=NULL)
    {
        return $this->_items[]=new EChmHhcItem($config);
    }
    public function getItems()
    {
        return $this->_items;
    }
}
