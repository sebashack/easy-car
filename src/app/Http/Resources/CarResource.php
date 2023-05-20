<?php

namespace App\Http\Resources;

use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $model = CarModel::findOrFail($this->getId());

        $values = [
            'id' => $this->getId(),
            'color' => $this->getColor(),
            'price_cop' => $this->getPrice(),
            'is_new' => $this->getIsNew(),
            'image_url' => $_ENV['APP_URL'].'/storage/'.$this->getImageUri(),
            'transmission_type' => $this->getTransmissionType(),
            'year' => $this->getManufactureYear(),
            'kilometers' => $this->getKilometers(),
            'type' => $this->getType(),
            'brand' => $model->getBrand(),
            'model' => $model->getModel(),
        ];

        return $values;
    }
}
