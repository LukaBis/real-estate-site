<?php

namespace App\Helpers;

class ArrayOfTestemonials
{
    public static function getArray()
    {
        $agents = [
          [
            "image_filename" => "testimonial-1.jpg",
            "mini_image_filename" => "mini-testimonial-1.jpg",
            "names" => "Pablo & Emma",
            "en" => ["text" => "We had a great experience working with EstateAgency.
             We recommend their services, becouse their agents are amazing."],
            "hrv" => ["text" => "Suradnja sa EstateAgency je bila odlična.
             Svima preporučamo ovu agenciju jer su im agenti jako profesionalni."]
          ],
          [
            "image_filename" => "testimonial-2.jpg",
            "mini_image_filename" => "mini-testimonial-2.jpg",
            "names" => "John & Lisa",
            "en" => ["text" => "Thanks to EstateAgency we found perfect house.
            Their agents are very profesional and great at their craft."],
            "hrv" => ["text" => "Zahvaljujući EstateAgency našli smo savršenu kuću.
            Agenti su jako profesionalni i dobri u svom poslu."]
          ]
        ];

        return $agents;
    }
}
