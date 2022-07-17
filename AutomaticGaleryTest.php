<?php declare(strict_types=1);
/*
 * (c) Ryszard Jaklewicz 2022 <r_jaklewicz@wp.pl>
 */
namespace App\ClassGalery\MyGalery;

/**
 * Generation images galery.
 */
class AutomaticGaleryTest
{
	public string $dirgallery1;
	public $array_or_object;
	
    public function __construct() {
		$this->dirgallery1 = DIR_IMAGES_GALERY1;
		$this->array_or_object = IMAGES_ARRAY_OR_OBJECT;
	}
	
	/**
     * Make gelery images.
     *
     * @param int $methodGenerateGalery How create image list
     *
     * @return array
     */
    public function makeImageGaleryTest(int $methodGenerateGallery) : string
    {
		if ($this->array_or_object=="use_array")	{
			$arrayYear = array();
			$array_all_images = array();
			$array_all_images = array_diff(scandir($this->dirgallery1), array('.', '..'));
			$array_all_images = array_values($array_all_images);
	
			for ($i=0; $i<count($array_all_images); $i++)  {
				$get_year = substr($array_all_images[$i], 0, 4);
				$arrayYear[] = substr($array_all_images[$i], 0, 4);
				if(strlen(substr($array_all_images[$i], 0, 4))=='4'){
					$arrayYear[] = substr($array_all_images[$i], 0, 4);
				}	
			}
			
			$arrayYear = array_unique($arrayYear);
			$array_Year_1 = array();
			foreach ($arrayYear as $value) {
				$array_Year_1[] = $value;
			}
			rsort($array_Year_1);
			$print_html = '<div>';	
			
			foreach ($array_Year_1 as $value) {
				$print_html .= '<div><h1>Rok:'.$value.'</h1></div>';
				$print_html .= '<div><h1>################################</h1></div>';
				$print_html .= '<div class="container">';
		
				for($ix=0; $ix<count($array_all_images); $ix++) {
					$file = $array_all_images[$ix];
					$first_four_sign = substr($array_all_images[$ix], 0, 4);
					
					if ($value==substr($array_all_images[$ix], 0, 4)) {
						$br='</br>';
						$print_html .= '<div><img src='.$this->dirgallery1.'/'.$file.' class="image"></img></div>'.$br;
					}
				}
				$print_html .= '</div>';
			}
			$print_html .= '</div>';
			return ($print_html); 
		} else {
			$arr_all_images = array_diff(scandir($this->dirgallery1), array('.', '..'));
			$all_images = json_decode(json_encode($arr_all_images), FALSE);
		}
		
    }
}
