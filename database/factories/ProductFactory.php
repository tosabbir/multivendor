<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 3),
            'sub_category_id' => $this->faker->numberBetween(1, 3),
            'brand_id' => $this->faker->numberBetween(1, 1),
            'vendor_id' => 3,
            // 'supplier_id' => $this->faker->numberBetween(1, 10),
            'product_name' => $this->faker->word,
            'product_slug' => $this->faker->slug,
            'product_code' => $this->faker->ean13,
            'product_barcode' => $this->faker->ean13,
            'product_size' => $this->faker->randomElement(['S', 'M', 'XL', 'L']),
            'product_color' => $this->faker->colorName,
            'product_materials' => $this->faker->word,
            'product_tags' => $this->faker->words(3, true),
            'product_quality_tag' => $this->faker->word,
            'product_weight' => $this->faker->randomFloat(2, 0.1, 10),
            'product_dimensions' => $this->faker->randomNumber(2) . 'x' . $this->faker->randomNumber(2) . 'x' . $this->faker->randomNumber(2),
            'product_sku' => $this->faker->bothify('SKU-???###'),
            'product_quantity_type' => $this->faker->randomElement(['piece', 'kg', 'litter', 'meter', 'litter&piece', 'kg&piece']),
            'product_buy_price' => $this->faker->randomFloat(2, 10, 100),
            'product_vat' => $this->faker->randomFloat(2, 1, 10),
            'product_shipping_const' => $this->faker->randomFloat(2, 5, 20),
            'product_sel_price' => $this->faker->randomFloat(2, 50, 150),
            'product_discount_price' => $this->faker->randomFloat(2, 40, 120),
            'product_event_price' => $this->faker->randomFloat(2, 30, 100),
            'product_short_description' => $this->faker->sentence,
            'product_long_description' => $this->faker->paragraph,
            'product_note' => $this->faker->text,
            // 'product_avg_review' => $this->faker->numberBetween(1, 5),
            'product_hot_deals' => $this->faker->randomElement(['Yes', 'No']),
            'product_featured' => $this->faker->randomElement(['Yes', 'No']),
            'product_special_offer' => $this->faker->randomElement(['Yes', 'No']),
            'product_special_deals' => $this->faker->randomElement(['Yes', 'No']),
            // 'product_thumbnail' => $this->faker->imageUrl(),
            'product_status_id' => $this->faker->numberBetween(1, 3),
            'product_vendor_status_id' => $this->faker->numberBetween(1, 2),
            'product_creator_id' => $this->faker->numberBetween(1, 10),
            'product_editor_id' => $this->faker->numberBetween(1, 10),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
