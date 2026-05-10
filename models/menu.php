<?php

class Menu {
    private $menuItems = [];
    public function __construct() {
        $this->menuItems = [
            [
                'id' => 1,
                'name' => 'Chocolate Croissant',
                'description' => 'Croissant renyah berlapis mentega dengan isian coklat premium dan taburan almond.',
                'price' => 25000,
                'image' => 'croissant.jpeg',
                'category' => 'Pastry'
            ],
            [
                'id' => 2,
                'name' => 'Sourdough',
                'description' => 'Roti yang melalui proses fermentasi alami menggunakan ragi dan bakteri baik.',
                'price' => 18000,
                'image' => 'sourdough.jpeg',
                'category' => 'Roti'
            ],
            [
                'id' => 3,
                'name' => 'Kue Red Velvet',
                'description' => 'Kue red velvet lembut dengan cream cheese frosting yang manis dan creamy.',
                'price' => 45000,
                'image' => 'redvelvet.jpeg',
                'category' => 'Kue'
            ],
            [
                'id' => 4,
                'name' => 'Pie Apel',
                'description' => 'Pie dengan isian apel segar dan kayu manis, crust yang renyah.',
                'price' => 32000,
                'image' => 'pieapel.jpeg',
                'category' => 'Pie'
            ],
            [
                'id' => 5,
                'name' => 'Donat Artisan',
                'description' => 'Donat empuk dengan glazur dan motif custom yang menarik.',
                'price' => 15000,
                'image' => 'donut.jpeg',
                'category' => 'Donat'
            ],
            [
                'id' => 6,
                'name' => 'Cinnamon Roll',
                'description' => 'Roti gulung dengan aroma kayu manis yang dilapisi dengan cream cheese yang lumer.',
                'price' => 55000,
                'image' => 'cinnamonroll.jpeg',
                'category' => 'Roti'
            ]
        ];
    }
    
    public function getAllItems()
    {
        return $this->menuItems;
    }
    
    public function getItemById($id)
    {
        foreach ($this->menuItems as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
        return null;
    }
    
    public function getItemsByCategory($category)
    {
        return array_filter($this->menuItems, function($item) use ($category) {
            return $item['category'] === $category;
        });
    }
}
?>