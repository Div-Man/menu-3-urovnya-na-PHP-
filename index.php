<?php 

	/*
		SELECT
    category.id AS catId, category.name AS catName,
    sub_category.id AS subCatId, sub_category.name AS subCatName,
    page.id AS pageId, page.name AS pageName
   
FROM category LEFT JOIN sub_category
ON sub_category.category_id = category.id LEFT JOIN page
ON page.sub_category_id = sub_category.id ORDER BY category.id
	*/
	
	$res = [
        ['catId' => 1, 'catName' => 'Программы', 'subCatId' => 1, 'subCatName' => "Антивирусы", 'pageId' => "1", 'pageName' => "Касперский"],
        ['catId' => 1, 'catName' => 'Программы', 'subCatId' => 4, 'subCatName' => "Аудио", 'pageId' => "4", 'pageName' => "VirtualDJ"],
        ['catId' => 1, 'catName' => 'Программы', 'subCatId' => 4, 'subCatName' => "Аудио", 'pageId' => "5", 'pageName' => "FL Studio"],
        ['catId' => 1, 'catName' => 'Программы', 'subCatId' => 1, 'subCatName' => "Антивирусы", 'pageId' => "6", 'pageName' => "NOD32"],
        ['catId' => 1, 'catName' => 'Программы', 'subCatId' => 2, 'subCatName' => "Запись", 'pageId' => "NULL", 'pageName' => "NULL"],
        ['catId' => 1, 'catName' => 'Программы', 'subCatId' => 3, 'subCatName' => "Интернет", 'pageId' => "NULL", 'pageName' => "NULL"],
        ['catId' => 2, 'catName' => 'Фильмы',    'subCatId' => 5, 'subCatName' => "Боевики", 'pageId' => "2", 'pageName' => "Джпеки Чан"],
        ['catId' => 2, 'catName' => 'Фильмы',    'subCatId' => 7, 'subCatName' => "Ужастики", 'pageId' => "3", 'pageName' => "Псы войны"],
        ['catId' => 2, 'catName' => 'Фильмы',    'subCatId' => 5, 'subCatName' => "Боевики", 'pageId' => "8", 'pageName' => "Американский ниндзя"],
        ['catId' => 2, 'catName' => 'Фильмы',    'subCatId' => 6, 'subCatName' => "Фантастика", 'pageId' => "NULL", 'pageName' => "NULL"],
    ];
	
	$mass = [];
foreach($res as $cat) {
    if (!array_key_exists($cat['catName'] . '|' . $cat['catId'], $mass)) {
        $mass[$cat['catName'] . '|' . $cat['catId']] = [$cat['subCatName'] . '|' . $cat['subCatId']=> [$cat['pageId']=>$cat['pageName']]];
    }
   
    else {
        $mass[$cat['catName']. '|' .$cat['catId']][$cat['subCatName'] . '|' .$cat['subCatId']][$cat['pageId']]=$cat['pageName'];
    }
}

echo '<ul>';
foreach($mass as $key => $val) {
    $category = explode('|', $key);
    echo '<li><a href="/category/'.$category[1].'">'.$category[0].'</a>';
         foreach($val as $k => $v) {
            $subCategory = explode('|', $k);
                echo '<ul>';
                    echo '<li><a href="/sub-category/'.$subCategory[1].'">'.$subCategory[0].'</a>';
                         foreach($v as $postKey => $postVal) {
                            echo '<ul>';
                                echo '<li><a href="/post/'.$postKey.'">'.$postVal.'</a></li>';
                            echo '</ul>';
                         }
                    echo '</li>';
                echo '</ul>';
         }
    echo '</li>';
}
echo '</ul>';