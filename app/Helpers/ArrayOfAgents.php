<?php

namespace App\Helpers;

class ArrayOfAgents {

  public static function getArray()
  {
      $agents = [
        [
          "full_name" => "John Rivers",
          "phone" => "095 5689 124",
          "email" => "john.rivers@email.com",
          "image" => "johnrivers.jpg",
          "en" => ["about" => "One of the best real estate agents in New York. His specialty made a lot of clients happy."],
          "hrv" => ["about" => "Jedan od najboljih agenata u New York-u. Njegova profesionalnost i stručnost je zadovoljila puno klijenata."]
        ],
        [
          "full_name" => "Allen Wade",
          "phone" => "097 5459 122",
          "email" => "allen.wade@email.com",
          "image" => "allenwade.jpg",
          "en" => ["about" => "One of the best real estate agents in New York. His specialty made a lot of clients happy."],
          "hrv" => ["about" => "Jedan od najboljih agenata u New York-u. Njegova profesionalnost i stručnost je zadovoljila puno klijenata."]
        ],
        [
          "full_name" => "Jully Geller",
          "phone" => "096 4523 789",
          "email" => "jully.geller@email.com",
          "image" => "jullygeller.jpg",
          "en" => ["about" => "One of the best real estate agents in New York. His specialty made a lot of clients happy."],
          "hrv" => ["about" => "Jedan od najboljih agenata u New York-u. Njegova profesionalnost i stručnost je zadovoljila puno klijenata."]
        ],
        [
          "full_name" => "Susan Dragic",
          "phone" => "094 7893 425",
          "email" => "susan.dragic@email.com",
          "image" => "susandragic.jpg",
          "en" => ["about" => "One of the best real estate agents in New York. His specialty made a lot of clients happy."],
          "hrv" => ["about" => "Jedan od najboljih agenata u New York-u. Njegova profesionalnost i stručnost je zadovoljila puno klijenata."]
        ],
        [
          "full_name" => "Mario Maric",
          "phone" => "094 7894 851",
          "email" => "mario.maric@email.com",
          "image" => "mariomaric.jpg",
          "en" => ["about" => "One of the best real estate agents in New York. His specialty made a lot of clients happy."],
          "hrv" => ["about" => "Jedan od najboljih agenata u New York-u. Njegova profesionalnost i stručnost je zadovoljila puno klijenata."]
        ],
        [
          "full_name" => "James Johanes",
          "phone" => "091 7889 444",
          "email" => "james.johanes@email.com",
          "image" => "jamesjohanes.jpg",
          "en" => ["about" => "One of the best real estate agents in New York. His specialty made a lot of clients happy."],
          "hrv" => ["about" => "Jedan od najboljih agenata u New York-u. Njegova profesionalnost i stručnost je zadovoljila puno klijenata."]
        ]
      ];

      return $agents;
  }

}
