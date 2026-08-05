<?php

namespace Database\Seeders;

use App\Models\AvatarOption;
use Illuminate\Database\Seeder;

class AvatarOptionsSeeder extends Seeder
{
    /**
     * Seeds the full DiceBear "adventurer" option catalog across the 7
     * customizable attributes (glasses/earrings were deliberately dropped —
     * "no extra"). Every user starts with only the DEFAULT_AVATAR_CONFIG
     * value per attribute unlocked for free (price_gems=0, is_default=true);
     * every other option must be purchased with gems via
     * AvatarController::unlock(). Prices are a flat per-category starting
     * point — fully admin-editable afterward via the Avatar Options CRUD.
     */
    public function run(): void
    {
        $this->seedRange('skinColor', ['ffdbb4', 'edb98a', 'd08b5b', 'ae5d29', '9e5622', '763900', '614335', 'f2d3b1'], 'f2d3b1', 20);
        $this->seedRange('hairColor', ['0e0e0e', '3a1f1f', '6c4545', 'a55728', 'd6b370', 'e8e1e1', '9a3324', '562306'], '6c4545', 20);
        $this->seedRange('backgroundColor', ['b6e3f4', 'c0aede', 'd1d4f9', 'ffd5dc', 'ffdfbf', 'c8f4de', 'fff3b0', 'f4d9d0'], 'b6e3f4', 15);

        $hairOptions = [...$this->range(19, 'short'), ...$this->range(26, 'long')];
        $this->seedRange('hair', $hairOptions, 'short16', 40);

        $this->seedRange('eyes', $this->range(26, 'variant'), 'variant12', 30);
        $this->seedRange('eyebrows', $this->range(15, 'variant'), 'variant05', 25);
        $this->seedRange('mouth', $this->range(30, 'variant'), 'variant15', 30);
    }

    private function range(int $count, string $prefix): array
    {
        return array_map(fn ($i) => $prefix.str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT), range(0, $count - 1));
    }

    private function seedRange(string $attributeType, array $values, string $defaultValue, int $priceGems): void
    {
        AvatarOption::where('attribute_type', $attributeType)->delete();

        foreach ($values as $index => $value) {
            $isDefault = $value === $defaultValue;

            AvatarOption::create([
                'attribute_type' => $attributeType,
                'value' => $value,
                'price_gems' => $isDefault ? 0 : $priceGems,
                'is_default' => $isDefault,
                'order_number' => $index + 1,
            ]);
        }
    }
}
