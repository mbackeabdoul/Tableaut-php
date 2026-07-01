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
    if(count($categories[$i]['produits'])===0){
        echo "nom".$categories[$i]['nom'];
    }
}

$codeValide = false;
do{
    $code = readline("Code:");
    $codeValide = true;
    for($i = 0; $i < count($categories); $i++){
        if($categories[$i]['code'] == $code){
            echo "Code deja exise!";
            $codeValide = false;
        }
    }
}while($codeValide == false);

$nomValide = false;
do{
    $nom = readline("Nom:");
    $nomValide = true;
    for($i = 0; $i < count($categories); $i++){
        if($categories[$i]['nom'] == $nom){
            echo "Nom deja exsite";
            $nomValide = false;
        }
    }
}while($nomValide == false);

 $categories[]=[
    'nom' => $nom,
     'code' => $code,
    'produits'=>[]
    ];

    $categorieExiste = false;
do {
    $codeCategorie = readline("Code de categorie:");
    for($i = 0; $i < count($categories); $i++){
        if($categories[$i]['code'] == $codeCategorie){
          $categorieExiste = true;
          $categorieIndex = $i;
        }
    }
    if($categorieExiste == false){
        echo "Categorie nesxiste pas !\n";
    }
    
} while($categorieExiste == false);
    $nomDuProduit = readline("nom produit:");
    $referenceDuProduit = readline("reference:");
    $prixDuProduit = readline("prix: ");
    $quantiteDuProduit = readline("quantite:");

    $produit = [
        'nom'=> $nomDuProduit,
        'reference'=> $referenceDuProduit,
        'prix'=> $prixDuProduit,
        'quantite'=> $quantiteDuProduit
    ];

$categories[$categorieIndex]['produits'][] = $produit;
echo "Produit ajoutee \n";