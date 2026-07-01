<?php
$categories = [
   0=> [
        "nom" => "categorie1",
        "code" => "006",
        "produits" =>[
           0=> ["nom" => "cafe","reference" => "001","quantite" => "5","prix" => "3000"],
           1=> ["nom" => "lait","reference" => "002","quantite" => "6","prix" => "2000"]
        ]
    ],
    1=> [
        "nom" => "categorie2",
        "code" => "007",
        "produits" =>[]
    ]
];

// foreach ($categories as $categorie) {
//     if (count($categorie['produits'])===0) {
//         echo "nom".$categorie['nom'];
//     }
// }
for ($i =0; $i<count($categories); $i++){
    if($categories[$i]['produits']===0){
        echo "nom".$categories[$i]['nom'];
    }
}

$codeValide = false;
do {
    $code = readline("Code : ");
    $codeValide = true;
    for($i = 0; $i < count($categories); $i++){
        if($categories[$i]['code'] == $code){
            echo "Code deja exise!";
            $codeValide = false;
        }
    }
} while($codeValide == false);

