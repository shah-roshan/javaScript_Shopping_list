
<?php

/**
 * Shopping class for items that implements JsonSerializable to let json access its private variables
 * and contains several get and set methods.
 *  By Roshan Shah,000793559
 *  date:2nd November,2019
 * 
 */

class Item implements JsonSerializable
{
    /**
     * id of the item
     */
    private $id;
    /**
     * name of the item
     */
    private $item;
    /**
     * quantity of the item
     */
    private $quantity;
    /**
     * state of completion of the item
     */
    private $done;

    /**
     * Constructor function for the class that sets all the values
     * @param {id of the item} id
     * @param {name of the item} item
     * @param {quantity of the item} quantity
     * @param {state of completion of the item} done
     */
    public function __construct($id, $item, $quantity, $done)
    {
        $this->id = $id;
        $this->item = $item;
        $this->quantity = $quantity;
        $this->done = $done;
    }
    /**
     * Represts a string value of the object
     * @returns string value of the object 
     */
    public function __toString()
    {
        return (string) $this->id . "." . (string) $this->item . "(" . (string) $this->quantity . ")";
    }
    /**
     * gives the id of the item
     * @returns id value of the object 
     */
    public function getId()
    {
        return (string) $this->id;
    }
    /**
     *  the name
     * of the item
     * @returns the name
     * of the item
     * 
     */
    public function getItem()
    {
        return (string) $this->item;
    }
    /**
     *  quantity of the item
     * @returns the quantity of the item
     */
    public function getQuantity()
    {
        return (string) $this->quantity;
    }
    /**
     * boiler plate code for the  JsonSerializable
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
?>