<?php


//  Na tretej stránke budú zobrazené nasledujúce štatistické údaje:
//· počet návštevníkov vášho portálu, pričom títo návštevníci budú rozdelení na základe štátov,
// z ktorých podľa svojej IP adresy pochádzajú. Tieto údaje uveďte prehľadne do tabuľky, v ktorej
// bude uvedená vlajka daného štátu, meno tohto štátu a počet návštevníkov z tohoto štátu. Za unikátnu
// návštevu sa považuje 1 návšteva z 1 IP adresy počas 1 dňa.

//· v prípade kliknutia na daný štát sa otvorí podobná tabuľka, kde sa budú zobrazovať informácie o počtoch
// návštev z miest daného štátu. Neidentifikované mestá sa budú spočítavať do kolonky „nelokalizované mestá a vidiek“.

//· mapa s bodkami, odkiaľ pochádzali návštevníci vášho portálu (realizácia mapy môže byť spravená napr. cez Google mapy,
// OpenStreet mapy, resp. inú vami vybranú alternatívu).

//· informácia, v ktorom čase koľko ľudí navštívilo váš portál. Vyhodnocujte časové pásma medzi 6:00-15:00, 15:00-21:00,
// 21:00-24:00, 24:00-6:00. Berte do úvahy lokálny čas daného užívateľa (t.j. ak sa na stránku pozrie Bratislavčan o 19:00
// a človek z New Yorku svojho lokálneho času tiež o 19:00, tak napriek tomu, že medzi týmito dvoma mestami je časový posun
// 6 hodín, tak sa to bude považovať za rovnaký lokálny čas).

//· informácia o tom, ktorá z vašich troch stránok bola najčastejšie navštevovaná.