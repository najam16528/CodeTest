<?php
class WallysWidgetsCalculator
{
    /**
     * Your solution should return an array with the pack sizes as the key
     * and the number of packs in that size as the value.
     *
     * Pack sizes that are not required should not be included.
     *
     * Example:
     *
     * getPacks(251, [
     *  250,
     *  500,
     *  1000
     * ])
     *
     * should return:
     *
     * [500 => 1]
     */
    public function getPacks(int $orderQuantity, array $packSizes): array
    {
    // TODO: Solution
    rsort($packSizes);
	$results = array_fill_keys($packSizes, 0);
	//handling smallest pack size and single pack element logic
	$minimum_in_pack      = min($packSizes);
	$smallestCheckArray   = $packSizes;
	end($smallestCheckArray);
	$sec_last=prev($smallestCheckArray);

    while($orderQuantity > 0)//251
	{
		if($orderQuantity>$minimum_in_pack && $orderQuantity<$sec_last && count($packSizes)>1)//smallest size pack element
		{
		     ++$results[$sec_last];
		     $orderQuantity -= $sec_last;	
			}
			else{
        foreach($packSizes as $size)
		{
            if($size <= $orderQuantity) 
			break;
        }
        ++$results[$size];
        
		$orderQuantity -= $size;
			}
    }
    return $results;	
    }
}//End class

//Test Output
$orders = [
    1,
	250,
    251,    
	500,
	501,
	12001
];
$packSizes = [250,500,1000,2000,5000];
$packObj   = new WallysWidgetsCalculator();

echo "<pre>";
foreach($orders as $orderQuantity) 
print_r($packObj->getPacks($orderQuantity,$packSizes));