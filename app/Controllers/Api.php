<?php namespace App\Controllers;
use CodeIgniter\HTTP\RequestInterface;

class Api extends BaseController
{
    
    private function showResult($code,$cont){
        echo json_encode(array('code'=>$code,
                               'content'=>$cont));
        die();
    }

    public function getWelcomeScreen(){
        $info = array(
            'text' => "به فروشگاه محله خوش آمدید\nلطفا از منو  گزینه مناسب را انتخاب نمایید",
            'keyboards' => array(
                array('title'=>'دسته محصولات','link'=>'getCategories'),
                array('title'=>'تماس با ما', 'link'=>'contact'),
                array('title'=>'جستجوی محصولات','link'=>'searchProducts'),
                array('title'=>'سبد خرید','link'=>'basket'),
                array('title'=>'پیگیری سفارش','link'=>'tracking'),
            )
        );
        $this->showResult(200,$info) ;
    }

    public function getCategories(){
        $info = array(
            'text'=> 'تمامی دسته بندی هایی که در این بخش خواهید دید با محصولات دیده میشود',
            'categories' => array(
                array('title'=>'خرسی', 'link' => 'getCatProducts'),
                array('title'=>'خرگوشی', 'link' => 'getCatProducts'),
                array('title'=>'حوله ای', 'link' => 'getCatProducts'),
            ),
            'keyboard' => array(
                array('title'=>'دسته محصولات','link'=>'getCategories'),
                array('title'=>'تماس با ما', 'link'=>'contact'),
                array('title'=>'جستجوی محصولات','link'=>'searchProducts'),
                array('title'=>'سبد خرید','link'=>'basket'),
                array('title'=>'پیگیری سفارش','link'=>'tracking'),
            )
        );
        $this->showResult(200,$info);
    }

    public function getCatProducts($cat=-1,$page=1){
        $cat = intval($cat);
        $page = intval($page);
        if($cat <= 0 )
            $this->showResult(404,'Invalid category id');
        $page = $page <= 0 ? 1 : $page;

        $info = array(
            'text' => 'در این بخش تمامی کالاهای مربوط به این دسته بندی نمایش داده می شود',
            'products' => array(
                array('title'=> 'کیف خرسی شماره ۱', 'picture'=> 'https://www.ninibazar.com/wp-content/uploads/2020/05/baby-bag-bear-1.jpg',
                      'link' => 'getProductVarient/1'),
                array('title'=> 'کیف خرسی شماره ۲', 'picture'=> 'https://www.ninibazar.com/wp-content/uploads/2020/05/baby-bag-bear-1.jpg',
                      'link' => 'getProductVarient/2'),
                array('title'=> 'کیف خرسی شماره ۳', 'picture'=> 'https://www.ninibazar.com/wp-content/uploads/2020/05/baby-bag-bear-1.jpg',
                      'link' => 'getProductVarient/3'),
            ),
            'keyboard' => array(
                array('title'=>'دسته محصولات','link'=>'getCategories'),
                array('title'=>'تماس با ما', 'link'=>'contact'),
                array('title'=>'جستجوی محصولات','link'=>'searchProducts'),
                array('title'=>'سبد خرید','link'=>'basket'),
                array('title'=>'پیگیری سفارش','link'=>'tracking'),
            )
        );
        if($page > 2) $info['products'] = array();  
        $this->showResult(200,$info);
    }

    public function topSellItems(){
        $info = array(
            'text' => 'در این بخش تمامی کالاهای مربوط به این دسته بندی نمایش داده می شود',
            'products' => array(
                array('title'=> 'کیف خرسی شماره ۱', 'picture'=> 'https://www.ninibazar.com/wp-content/uploads/2020/05/baby-bag-bear-1.jpg',
                      'link' => 'Api/getProductVarient/1'),
                array('title'=> 'کیف خرسی شماره ۲', 'picture'=> 'https://www.ninibazar.com/wp-content/uploads/2020/05/baby-bag-bear-1.jpg',
                      'link' => 'Api/getProductVarient/2'),
                array('title'=> 'کیف خرسی شماره ۳', 'picture'=> 'https://www.ninibazar.com/wp-content/uploads/2020/05/baby-bag-bear-1.jpg',
                      'link' => 'Api/getProductVarient/3'),
            ),
            'keyboard' => array(
                array('title'=>'دسته محصولات','link'=>'getCategories'),
                array('title'=>'تماس با ما',
                      'link'=>'contact'),
                array('title'=>'جستجوی محصولات','link'=>'searchProducts'),
                array('title'=>'سبد خرید','link'=>'basket'),
                array('title'=>'پیگیری سفارش','link'=>'tracking'),
            )
        );

        $this->showResult(200,$info);
    }

    public function getspecificItems(){
        $info = array(
            'text' => 'در این بخش تمامی کالاهای مربوط به این دسته بندی نمایش داده می شود',
            'products' => array(
                array('title'=> 'کیف خرسی شماره ۱', 'picture'=> 'https://www.ninibazar.com/wp-content/uploads/2020/05/baby-bag-bear-1.jpg',
                      'link' => 'Api/getProductVarient/1'),
                array('title'=> 'کیف خرسی شماره ۲', 'picture'=> 'https://www.ninibazar.com/wp-content/uploads/2020/05/baby-bag-bear-1.jpg',
                      'link' => 'Api/getProductVarient/2'),
                array('title'=> 'کیف خرسی شماره ۳', 'picture'=> 'https://www.ninibazar.com/wp-content/uploads/2020/05/baby-bag-bear-1.jpg',
                      'link' => 'Api/getProductVarient/3'),
            ),
            'keyboard' => array(
                array('title'=>'دسته محصولات','link'=>'getCategories'),
                array('title'=>'تماس با ما',
                      'link'=>'contact'),
                array('title'=>'جستجوی محصولات','link'=>'searchProducts'),
                array('title'=>'سبد خرید','link'=>'basket'),
                array('title'=>'پیگیری سفارش','link'=>'tracking'),
            )
        );
        
        $this->showResult(200,$info);
    }

    public function getProductVarient($pid=-1){
        $pid = intval($pid);
        if($pid <= 0 )
            $this->showResult(404,'Invalid Product Id');

        $info = array(
            'text' => 'لطفا تنوع کالا را انتخاب کنید',
            'varients' => array(
                array('title'=> 'رنگ قرمز', 'picture'=> 'https://www.ninibazar.com/wp-content/uploads/2020/05/baby-bag-bear-1.jpg',
                      'link' => 'addBasket/1/1'),
                array('title'=> 'رنگ آبی', 'picture'=> 'https://www.ninibazar.com/wp-content/uploads/2020/05/baby-bag-bear-1.jpg',
                      'link' => 'addBasket/2/1'),
                array('title'=> 'رنگ سبز', 'picture'=> 'https://www.ninibazar.com/wp-content/uploads/2020/05/baby-bag-bear-1.jpg',
                      'link' => 'addBasket/3/1'),
            ),
            'keyboard' => array(
                array('title'=>'دسته محصولات','link'=>'getCategories'),
                array('title'=>'تماس با ما',
                      'link'=>'contact'),
                array('title'=>'جستجوی محصولات','link'=>'searchProducts'),
                array('title'=>'سبد خرید','link'=>'basket'),
                array('title'=>'پیگیری سفارش','link'=>'tracking'),
            )
        );
        
        $this->showResult(200,$info);
    }

    public function addBasket($pid=-1,$pvar=-1){
        $pid = intval($pid);
        if($pid <= 0 )
            $this->showResult(404,'Invalid Product Id');
        $pvar = intval($pid);
        if($pvar <= 0 )
            $this->showResult(404,'Invalid Product Varient');

        $this->showResult(200,'Added Successfully');

    }

    public function showBasket(){

        $info = array(
            'text' => 'لیست خرید شما به شکل زیر می باشد',
            'products' => array(
                array('id'=>1, 
                      'title'=> 'کیف خرسی ۱', 
                      'picture'=> 'https://www.ninibazar.com/wp-content/uploads/2020/05/baby-bag-bear-1.jpg',
                      'varient' => 'رنگ قرمز ' , 
                      'qnt' => 2, 
                      'price' => 240000),
                array('id'=>2, 
                      'title'=> 'کیف خرسی ۲', 
                      'picture'=> 'https://www.ninibazar.com/wp-content/uploads/2020/05/baby-bag-bear-1.jpg',
                      'varient' => 'رنگ آبی ' , 
                      'qnt' => 1, 
                      'price' => 44000),
            ),
            'totalqnt' => 3,
            'totalprice' => 920000,
            'keyboard' => array(
                array('title'=>'دسته محصولات','link'=>'getCategories'),
                array('title'=>'تماس با ما',
                      'link'=>'contact'),
                array('title'=>'جستجوی محصولات','link'=>'searchProducts'),
                array('title'=>'سبد خرید','link'=>'basket'),
                array('title'=>'پیگیری سفارش','link'=>'tracking'),
            )
        );
        
        $this->showResult(200,$info);

    }

    public function removeItem($bid=-1){
        $bid = intval($bid);
        if($bid <= 0)
            $this->showResult(404,'Invalid product id in basket');
        $this->showResult(200,'Item Removed Successfully');
    }

    public function getAddresses(){
        $info = array(
            'text' => 'لطفا آدرس خود را انتخاب کنید',
            'addresses' => array(
                array('title'=> 'خیابان پاسداران ، نبش  بلوار دوم ، ساختمان اداری ستاوه طبقه ۱۲ واحد ۳ - علی حمیدی', 
                      'picture'=> 'https://www.ninibazar.com/wp-content/uploads/2020/05/baby-bag-bear-1.jpg',
                      ),
            ),
            'keyboard' => array(
                array('title'=>'دسته محصولات','link'=>'getCategories'),
                array('title'=>'تماس با ما',
                      'link'=>'contact'),
                array('title'=>'جستجوی محصولات','link'=>'searchProducts'),
                array('title'=>'سبد خرید','link'=>'basket'),
                array('title'=>'پیگیری سفارش','link'=>'tracking'),
            )
        );
        $this->showResult(200,$info);
    }

    public function addNewAddress(){
        $lat  = $this->request->getPost('lat');
        $long = $this->request->getPost('long');
        $address = $this->request->getPost('address');
        $recipient = $this->request->getPost('recipient');
        if($lat == '' || $long == '' || $address == '' || $recipient == '')
            $this->showResult(412,'Invalid enteries');
        else
            $this->showResult(200,'Adress added successfully');

    }

    public function getsendTypes(){
        $info = array(
            'text' => 'لطفا شیوه ارسال سفارش را انتخاب نمایید',
            'sendtypes' => array(
                array('title'=> 'ارسال پستی\n هزینه :‌ ۲۰ هزار تومان \n سه روزه' ,'link' => 'Api/selectSendType/1'),
                array('title'=> 'ارسال تیپاکس\n هزینه :‌ ۳۰ هزار تومان \n ۱ روزه' ,'link' => 'Api/selectSendType/2')
            ),
            'keyboard' => array(
                array('title'=>'دسته محصولات','link'=>'getCategories'),
                array('title'=>'تماس با ما',
                      'link'=>'contact'),
                array('title'=>'جستجوی محصولات','link'=>'searchProducts'),
                array('title'=>'سبد خرید','link'=>'basket'),
                array('title'=>'پیگیری سفارش','link'=>'tracking'),
            )
        );
        $this->showResult(200,$info);
    }

    public function selectSendType($stype=-1){
        $stype = intval($stype);
        if($stype <= 0 )
            $this->showResult(404,'Invalid shipping type');

        $this->showResult(412,'Send Type added successfully !');
    }

    public function showPayLink($ordId=-1){
        $ordId = intval($ordId);
        if($ordId <= 0)
            $this->showResult(404,'Invalid Order Id');
        $info = array(
            'link' => 'http://shaparak.com/us/sdfsdf',
            'keyboard' => array(
                array('title'=>'دسته محصولات','link'=>'getCategories'),
                array('title'=>'تماس با ما',
                      'link'=>'contact'),
                array('title'=>'جستجوی محصولات','link'=>'searchProducts'),
                array('title'=>'سبد خرید','link'=>'basket'),
                array('title'=>'پیگیری سفارش','link'=>'tracking'),
            )
        );
    }

    public function contact(){
        $info = array(
            "text"=> "برای تماس با ما از راه های زیر میتوانید اقدام کنید \n info@gmail.com",
            'keyboard' => array(
                array('title'=>'دسته محصولات','link'=>'getCategories'),
                array('title'=>'جستجوی محصولات','link'=>'searchProducts'),
                array('title'=>'سبد خرید','link'=>'basket'),
                array('title'=>'پیگیری سفارش','link'=>'tracking'),
            )
        );
        $this->showResult(200,$info);
    }

    public function searchProducts(){
        $term = $this->request->getGet('q');
        if($term == '')
            $this->showResult(412,'Empty search term');
        $info = array(
            'text' => 'لیست جستجو شما به شکل زیر می باشد',
            'products' => array(
                array('id'=>1, 
                      'title'=> 'کیف خرسی ۱', 
                      'picture'=> 'https://www.ninibazar.com/wp-content/uploads/2020/05/baby-bag-bear-1.jpg',
                      'varient' => 'رنگ قرمز ' , 
                      'price' => 240000,
                      'link'  => base_url('Api/getProductVarient/1')
                    ),
                array('id'=>2, 
                      'title'=> 'کیف خرسی ۲', 
                      'picture'=> 'https://www.ninibazar.com/wp-content/uploads/2020/05/baby-bag-bear-1.jpg',
                      'varient' => 'رنگ آبی ' , 
                      'price' => 44000,
                      'link'  => base_url('Api/getProductVarient/2')
                    ),
            ),
            'keyboard' => array(
                array('title'=>'دسته محصولات','link'=>'getCategories'),
                array('title'=>'تماس با ما',
                      'link'=>'contact'),
                array('title'=>'جستجوی محصولات','link'=>'searchProducts'),
                array('title'=>'سبد خرید','link'=>'basket'),
                array('title'=>'پیگیری سفارش','link'=>'tracking'),
            )
        );
        $this->showResult(200,$info);
    }

    public function tracking($trackno=-1){
        $trackno = intval($trackno);
        if($trackno <= 0 )
            $this->showResult(404,'Invalid Tracking Number');

        $info = array(
            'text'=> 'کالای شما به پست فرستاده شده است و تا ۲۴ ساعت آینده به دست شما خواهد رسید',
            'keyboard' => array(
                array('title'=>'دسته محصولات','link'=>'getCategories'),
                array('title'=>'جستجوی محصولات','link'=>'searchProducts'),
                array('title'=>'سبد خرید','link'=>'basket'),
                array('title'=>'پیگیری سفارش','link'=>'tracking'),
            )
        );
        $this->showResult(200,$info);
    }

    public function defaultMessage(){
        $info = array(
            'text' => "پیام شما مفهوم نیست لطفا از لیست زیر کمک بگیرید",
            'default' => array(
                array('title'=>'دسته محصولات','link'=>'getCategories'),
                array('title'=>'تماس با ما',
                      'link'=>'contact'),
                array('title'=>'جستجوی محصولات','link'=>'searchProducts'),
                array('title'=>'سبد خرید','link'=>'basket'),
                array('title'=>'پیگیری سفارش','link'=>'tracking'),
            )
        ); 
        $this->showResult(200,$info) ;
    }

	public function index()
	{
		echo 'API Ver 1.0.';
	}

}
