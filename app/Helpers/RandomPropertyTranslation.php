<?php

namespace App\Helpers;

class RandomPropertyTranslation
{
    /**
    * Return property translated columns for testing purposes
    *
    * @return array
    */
    public static function translation()
    {
        $properties = [
          [
            "en" => "Elegant, graceful, extraordinary--what else can be said about this stunning sun-drenched magnificent Apartment located in this Pre-War Art Deco doorman building nestled in chic Nomad. This is a rare opportunity to own an apartment with the flexibility: spacious-- with 1600 square feet including two full bathrooms to change layouts at will. This apartment converts easily with its high ceilings giving it a loft-like feel of an artist's studio or a convertible two or three-bedroom for a family home.",
            "hrv" => "Elegantan, graciozan, izvanredan-što se još može reći o ovom zapanjujućem veličanstvenom stanu okupanom suncem koji se nalazi u ovoj prijeratnoj Art Deco portirskoj zgradi smještenoj u elegantnom Nomadu. Ovo je rijetka prilika za posjedovanje stana s fleksibilnošću: prostran- s 1600 četvornih metara uključujući dvije pune kupaonice za promjenu rasporeda po želji. Ovaj se stan lako pretvara s visokim stropovima dajući mu osjećaj potkrovlja umjetničkog studija ili kabriolet s dvije ili tri spavaće sobe za obiteljsku kuću."
          ],
          [
            "en" => "As you enter the foyer, you're welcomed with a view of Central Park through the large window. Dining area and living room are open with high ceilings and wood flooring throughout. Left of the foyer is an efficient kitchen with dishwasher and plenty of storage. The spacious, sunny bedroom also has direct park views. There are 4 spacious closets and a full bath.",
            "hrv" => "Kad uđete u predsoblje, dočekat će vas pogled na Central Park kroz veliki prozor. Blagovaonica i dnevni boravak otvoreni su s visokim stropovima i drvenim podovima. Lijevo od predsoblja je učinkovita kuhinja s perilicom posuđa i puno prostora za skladištenje. Prostrana, sunčana spavaća soba također ima izravan pogled na park. Postoje 4 prostrana ormara i potpuno kupatilo."
          ],
          [
            "en" => "This home has the perfect layout, with 6 bedrooms plus a library, 7 full bathrooms, 2 powder rooms, and a collection of high-end fixtures and finishes like herringbone white oak floors, and designer furniture from Fendi, Bentley, and Hermes.",
            "hrv" => "Ovaj dom ima savršen raspored, sa 6 spavaćih soba i knjižnicom, 7 punih kupaonica, 2 prašne sobe i zbirkom vrhunskih armatura i završnih obrada poput podova od bijelog hrasta od riblje kosti, te dizajnerskog namještaja iz Fendija, Bentleyja i Hermesa."
          ],
          [
            "en" => "A private elevator landing opens into a sweeping east-facing great room with a wood-burning fireplace and a formal dining area. The sublime eat-in kitchen has the most stunning views of Central Park, and is equipped with marble floors, countertops, and backsplashes, white lacquer and natural oak cabinets, polished chrome fixtures from Dornbracht, a massive island, a north-facing breakfast bar, a butler's pantry with a utility sink, and a suite of high-end appliances from Miele. A pair of powder rooms serve the main living and dining spaces.",
            "hrv" => "Privatno odmorište s liftom otvara se u veliku sobu okrenutu prema istoku s kaminom na drva i formalnom blagovaonicom. Uzvišena kuhinja s blagovaonicom ima najljepši pogled na Central Park i opremljena je mramornim podovima, radnim površinama i leđima, bijelim lakom i ormarima od prirodnog hrasta, uglačanim kromiranim elementima iz Dornbrachta, masivnim otokom, šankom za doručak okrenut prema sjeveru , ostava batlera s pomoćnim sudoperom i paket vrhunskih aparata iz Mielea. Par toaleta služi glavnim dnevnim i blagovaonskim prostorima."
          ],
          [
            "en" => "The primary suite is a sanctuary corner retreat with Central Park views, a sitting room, and couples' walk-through dressing rooms that lead to separate windowed bathrooms with slab marble walls, radiant heated floors, custom wood cabinets, floating tubs with incredible views, and carved oval sinks. Each of the remaining five bedrooms have ample closet space and a full en-suite bathroom.",
            "hrv" => "Primarni apartman je utočište u kutku utočišta s pogledom na Central Park, dnevni boravak i svlačionice za parove koje vode do zasebnih kupaonica sa prozorima sa mramornim zidovima, grijanih podova, prilagođenih drvenih ormara, plutajućih kadi s nevjerojatnim pogledom, i izrezbareni ovalni sudoperi. Svaka od preostalih pet spavaćih soba ima dovoljno prostora za ormare i vlastitu kupaonicu."
          ]
        ];

        return $properties[rand(0, count($properties) - 1)];
    }

}
