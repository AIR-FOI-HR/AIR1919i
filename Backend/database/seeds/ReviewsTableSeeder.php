<?php

use App\Review;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Reviews
        Review::create([
            'meal_id' => 1,
            'user_id' => 1,
            'stars' => 4,
            'comment' => 'It was much better than I expected. After my meal, I was knocked into a food coma. I was happy to see how clean everything was. I removed a star because the hostess made a pass at me. So uncomfortable.'
        ]);

        Review::create([
            'meal_id' => 2,
            'user_id' => 2,
            'stars' => 3,
            'comment' => 'I had high hopes for this place. Some of my favorite dishes are no longer available. The chicken was a little dry. 3 stars.'
        ]);

        Review::create([
            'meal_id' => 3,
            'user_id' => 3,
            'stars' => 5,
            'comment' => 'OMG! So good! I found the ambiance to be very charming. Make sure to save room for dessert, because that was the best part of the meal! They got a new customer for life!'
        ]);

        Review::create([
            'meal_id' => 4,
            'user_id' => 4,
            'stars' => 5,
            'comment' => 'This is one of my favorite places. I want to hire their decorator to furnish my house. The appetizers must be sprinkled with crack because I just craved for more and more. 5 stars!'
        ]);

        Review::create([
            'meal_id' => 5,
            'user_id' => 5,
            'stars' => 4,
            'comment' => 'Decent place. This was one of the best mouth-watering steaks I\'ve had grace my taste buds in a long time. The waitress was prompt and polite. 4 stars.'
        ]);

        Review::create([
            'meal_id' => 6,
            'user_id' => 6,
            'stars' => 5,
            'comment' => 'Best experience ever! The experience was heavenly as I was served a meal fit for God himself. After my meal, I was knocked into a food coma. This is definitely a spot I\'ll be frequenting.'
        ]);

        Review::create([
            'meal_id' => 7,
            'user_id' => 7,
            'stars' => 4,
            'comment' => 'I was pleasantly surprised. The steak was a little dry. Try out the huge selection of incredible appetizers. After my meal, I was knocked into a food coma. I had to take one star away because the chairs were a little sticky.'
        ]);

        Review::create([
            'meal_id' => 8,
            'user_id' => 8,
            'stars' => 5,
            'comment' => 'I\'ve got a fetish for good food and this place gets me hot! The waiter did an excellent job. After my meal, I was knocked into a food coma. I was happy to see how clean everything was. I\'m definitely coming back for more!'
        ]);

        Review::create([
            'meal_id' => 9,
            'user_id' => 9,
            'stars' => 2,
            'comment' => 'This place was nearby and I decided to check it out. Seriously, how difficult is it to get a clean glass around here? There were bits of food stuck to my silverware. I added one star because they gave me free bread.'
        ]);

        Review::create([
            'meal_id' => 10,
            'user_id' => 10,
            'stars' => 5,
            'comment' => 'Best experience ever! The appetizers must be sprinkled with crack because I just craved for more and more. Everything was simply decadent. I want to hire their decorator to furnish my apartment. Everything was just so yummy. They got a new customer for life!'
        ]);

        Review::create([
            'meal_id' => 11,
            'user_id' => 11,
            'stars' => 1,
            'comment' => 'Dreadful place. My water glass was stained with lipstick and had bits of food floating in it. Too many things on the menu look like crap, smell like crap, and taste like crap. 1 star was too generous.'
        ]);

        Review::create([
            'meal_id' => 12,
            'user_id' => 12,
            'stars' => 4,
            'comment' => 'This place had a lot of heart. After my meal, I was knocked into a food coma. The appetizers must be sprinkled with crack because I just craved for more and more. There were a lot of interesting decorations on the walls. The waitress did an excellent job. I could see myself being a regular here.'
        ]);

        Review::create([
            'meal_id' => 13,
            'user_id' => 13,
            'stars' => 4,
            'comment' => 'It was much better than I expected. Everything I tried was bursting with flavor. I was happy to see how clean everything was. The food was flavorful, savory, and succulent. I could see myself being a regular here.'
        ]);

        Review::create([
            'meal_id' => 14,
            'user_id' => 14,
            'stars' => 5,
            'comment' => 'I stumbled on this undiscovered gem right in our neighboorhood. Everything was simply decadent. The appetizers must be sprinkled with crack because I just craved for more and more. After my meal, I was knocked into a food coma. I\'d give more than 5 stars if I could!'
        ]);

        Review::create([
            'meal_id' => 15,
            'user_id' => 15,
            'stars' => 2,
            'comment' => 'Bleh. This place is very dumpy and in a serious need of a fresh paint job. I heard a rumor that the vegetarian dishes are prepared alongside the meat. The menu didn\'t match the one on their website. 2 stars.'
        ]);

        Review::create([
            'meal_id' => 16,
            'user_id' => 16,
            'stars' => 3,
            'comment' => 'This is one of my favorite places. Make sure to save room for dessert, because that was the best part of the meal! Everything I tried was bursting with flavor. The experience was heavenly as I was served a meal fit for God himself. The waitress was prompt and polite. This is definitely a spot I\'ll be frequenting.'
        ]);

        Review::create([
            'meal_id' => 17,
            'user_id' => 17,
            'stars' => 5,
            'comment' => 'It was much better than I expected. This was one of the best mouth-watering burgers I\'ve had grace my taste buds in a long time. After my meal, I was knocked into a food coma. Overall experience: 5 stars.'
        ]);

        Review::create([
            'meal_id' => 18,
            'user_id' => 18,
            'stars' => 5,
            'comment' => 'Oh my God! So yummy! I was happy to see how clean everything was. Everything from the starters to the entrees to the desserts meshed perfectly with my flavor-profile. The waiter was prompt and polite. This is definitely a spot I\'ll be frequenting.'
        ]);

        Review::create([
            'meal_id' => 19,
            'user_id' => 19,
            'stars' => 5,
            'comment' => 'Yumm-o! After my meal, I was knocked into a food coma. I want to hire their decorator to furnish my house. The food was flavorful, savory, and succulent. I\'m definitely coming back for more!'
        ]);

        Review::create([
            'meal_id' => 20,
            'user_id' => 20,
            'stars' => 4,
            'comment' => 'I have been here several times before. I found the entrees to be very agreeable to my personal flavor-profile. I want to hire their decorator to furnish my house. Overall experience: 4 stars.'
        ]);

        Review::create([
            'meal_id' => 21,
            'user_id' => 21,
            'stars' => 4,
            'comment' => 'I have been here several times before. The entrees are simply to die for. There were a lot of interesting decorations on the walls. Try out the huge selection of incredible appetizers. It could have been perfect, but the wait to get in was so long.'
        ]);

        Review::create([
            'meal_id' => 22,
            'user_id' => 22,
            'stars' => 5,
            'comment' => 'It was much better than I expected. Make sure to save room for dessert, because that was the best part of the meal! Everything was just so yummy. I want to hire their decorator to furnish my house. They got a new customer for life!'
        ]);

        Review::create([
            'meal_id' => 23,
            'user_id' => 23,
            'stars' => 4,
            'comment' => 'I was pleasantly surprised. The food was flavorful, savory, and succulent. The decor was unique and incredible. The waiter did an excellent job. Overall experience: 4 stars.'
        ]);

        Review::create([
            'meal_id' => 24,
            'user_id' => 24,
            'stars' => 4,
            'comment' => 'Decent place. The food was flavorful, savory, and succulent. The waiter was prompt and polite. I had a satisfactory experience and will have to try it again.'
        ]);

        Review::create([
            'meal_id' => 25,
            'user_id' => 1,
            'stars' => 5,
            'comment' => 'Oh! My! God! So awesome! The food was flavorful, savory, and succulent. The waiter was prompt and polite. Easily earned their 5 stars!'
        ]);

        Review::create([
            'meal_id' => 26,
            'user_id' => 2,
            'stars' => 5,
            'comment' => 'Oh my God! So yummy! The decor was unique and incredible. This was one of the best mouth-watering burgers I\'ve had grace my taste buds in a long time. After my meal, I was knocked into a food coma. The waiter was prompt and polite. Overall experience: 5 stars.'
        ]);

        Review::create([
            'meal_id' => 27,
            'user_id' => 3,
            'stars' => 5,
            'comment' => 'I\'ve got a fetish for good food and this place gets me hot! The waiter was prompt and polite. The food was flavorful, savory, and succulent. I was happy to see how clean everything was. Make sure to save room for dessert, because that was the best part of the meal! I would eat here every day if I could afford it!'
        ]);

        Review::create([
            'meal_id' => 28,
            'user_id' => 4,
            'stars' => 5,
            'comment' => 'Oh! My! God! So good! The appetizers must be sprinkled with crack because I just craved for more and more. I found the ambiance to be very charming. Everything was simply decadent. After my meal, I was knocked into a food coma. Overall experience: 5 stars.'
        ]);

        Review::create([
            'meal_id' => 1,
            'user_id' => 6,
            'stars' => 3,
            'comment' => 'I have been here several times before. The food was all right but seriously lacked presentation. Some of my favorite dishes are no longer available. The service wasn\'t that good and the waitress was tired. The ambiance gives off an earthy feel-good vibe. This place deserves its very average review.'
        ]);

        Review::create([
            'meal_id' => 2,
            'user_id' => 5,
            'stars' => 5,
            'comment' => 'I stumbled on this undiscovered gem right in our neighbourhood. The desserts must be sprinkled with crack because I just craved for more and more. Everything was just so yummy. They got a new customer for life!'
        ]);

        Review::create([
            'meal_id' => 3,
            'user_id' => 9,
            'stars' => 5,
            'comment' => 'Yumm-o! The food was flavorful, savory, and succulent. Everything was just so yummy. Easily earned their 5 stars!'
        ]);

        Review::create([
            'meal_id' => 4,
            'user_id' => 10,
            'stars' => 4,
            'comment' => 'This place had a lot of heart. The service was good for the most part but the waiter was a bit tired. The food is simply to die for. I found the ambiance to be very charming. Satisfactory experience, will come again.'
        ]);

        Review::create([
            'meal_id' => 5,
            'user_id' => 1,
            'stars' => 5,
            'comment' => 'Yummers! The food is simply to die for. I want to hire their decorator to furnish my apartment. After my meal, I was knocked into a food coma. Try out the huge selection of incredible appetizers. Overall experience: 5 stars.'
        ]);

        Review::create([
            'meal_id' => 6,
            'user_id' => 2,
            'stars' => 4,
            'comment' => 'Decent place. I found the entrees to be very agreeable to my personal flavor-profile. The decor was unique and incredible. The desserts must be sprinkled with crack because I just craved for more and more. I was happy to see how clean everything was. It could have been perfect, but the waiter made a pass at me. So inappropriate.'
        ]);

        Review::create([
            'meal_id' => 7,
            'user_id' => 4,
            'stars' => 5,
            'comment' => 'I stumbled on this undiscovered gem right in our neighboorhood. Make sure to save room for dessert, because that was the best part of the meal! The food was flavorful, savory, and succulent. I\'m definitely coming back for more!'
        ]);

        Review::create([
            'meal_id' => 8,
            'user_id' => 7,
            'stars' => 4,
            'comment' => 'It was much better than I expected. The food was flavorful, savory, and succulent. The ambiance gives off an earthy feel-good vibe. After my meal, I was knocked into a food coma. It could have been perfect, but the wait to get in was so long.'
        ]);

        Review::create([
            'meal_id' => 9,
            'user_id' => 8,
            'stars' => 3,
            'comment' => 'I felt like this place wasn\'t trying hard enough. There were a lot of interesting decorations on the walls. The service wasn\'t that good and the waitress was clueless. The tofu dish tasted spongy and a bit bland. Might be back. Time will tell.'
        ]);

        Review::create([
            'meal_id' => 10,
            'user_id' => 3,
            'stars' => 4,
            'comment' => 'I was pleasantly surprised. There were a lot of interesting decorations on the walls. The appetizers must be sprinkled with crack because I just craved for more and more. The entree I had was sublime. Everything I tried was bursting with flavor. It failed to meet the 5-star experience because the chairs were a little sticky.'
        ]);

        Review::create([
            'meal_id' => 11,
            'user_id' => 11,
            'stars' => 5,
            'comment' => 'Yummers! The experience was heavenly as I was served a meal fit for God himself. Everything I tried was bursting with flavor. Overall experience: 5 stars.'
        ]);

        Review::create([
            'meal_id' => 12,
            'user_id' => 15,
            'stars' => 5,
            'comment' => 'My taste buds are still singing from our last visit! Try out the huge selection of incredible appetizers. The waiter was prompt and polite. 5 stars!'
        ]);

        Review::create([
            'meal_id' => 13,
            'user_id' => 19,
            'stars' => 3,
            'comment' => 'I\'m torn about this place. I found the entrees to be somewhat agreeable to my personal flavor-profile. Overhyped. The menu didn\'t match the one on their website. The service wasn\'t that good and the waiter was rude. 3 stars.'
        ]);

        Review::create([
            'meal_id' => 14,
            'user_id' => 13,
            'stars' => 4,
            'comment' => 'Decent place. I was happy to see how clean everything was. Everything was mostly decadent. Everything I tried was bursting with flavor. Satisfactory experience, will come again.'
        ]);

        Review::create([
            'meal_id' => 15,
            'user_id' => 20,
            'stars' => 3,
            'comment' => 'I felt like this place was trying too hard. The service wasn\'t that good and the waiter was tired. The pork was undercooked. Overall, this place is just okay. I might come back.'
        ]);

        Review::create([
            'meal_id' => 16,
            'user_id' => 18,
            'stars' => 4,
            'comment' => 'I have been here several times before. I found the entrees to be very agreeable to my personal flavor-profile. I want to hire their decorator to furnish my apartment. I had to take one star away because the chairs were a little sticky.'
        ]);

        Review::create([
            'meal_id' => 17,
            'user_id' => 12,
            'stars' => 5,
            'comment' => 'I stumbled on this undiscovered gem right in our neighbourhood. The food was cooked to perfection. I want to hire their decorator to furnish my house. I would eat here every day if I could afford it!'
        ]);

        Review::create([
            'meal_id' => 18,
            'user_id' => 16,
            'stars' => 4,
            'comment' => 'This place had a lot of heart. Everything I tried was bursting with flavor. This was one of the best mouth-watering burgers I\'ve had grace my taste buds in a long time. After my meal, I was knocked into a food coma. It failed to meet the 5-star experience because the waitress had really bad body odor.'
        ]);

        Review::create([
            'meal_id' => 19,
            'user_id' => 17,
            'stars' => 4,
            'comment' => 'Decent place. Everything was mostly decadent. The ambiance gives off an earthy feel-good vibe. The waitress was prompt and polite. Everything I tried was bursting with flavor. Overall experience: 4 stars.'
        ]);

        Review::create([
            'meal_id' => 20,
            'user_id' => 20,
            'stars' => 3,
            'comment' => 'This place was nearby and I decided to check it out. The photos of the food were appetizing and palpable, but didn\'t live up to the hype. Overhyped. 3 stars.'
        ]);

        Review::create([
            'meal_id' => 21,
            'user_id' => 21,
            'stars' => 4,
            'comment' => 'I stumbled on this undiscovered gem right in our neighboorhood. Make sure to save room for dessert, because that was the best part of the meal! The decor was unique and incredible. After my meal, I was knocked into a food coma. I removed a star because the busboy kept looking at me funny the whole time.'
        ]);

        Review::create([
            'meal_id' => 22,
            'user_id' => 1,
            'stars' => 4,
            'comment' => 'Decent place. The desserts must be sprinkled with crack because I just craved for more and more. After my meal, I was knocked into a food coma. The food is simply to die for. The ambiance gives off an earthy feel-good vibe. I docked them one star because the waitress had really bad body odor.'
        ]);

        Review::create([
            'meal_id' => 23,
            'user_id' => 3,
            'stars' => 5,
            'comment' => 'OMG! So yummy! I want to hire their decorator to furnish my house. The waiter did an excellent job. Everything was simply decadent. Try out the huge selection of incredible appetizers. I\'m definitely coming back for more!'
        ]);

        Review::create([
            'meal_id' => 24,
            'user_id' => 24,
            'stars' => 1,
            'comment' => 'Terrible! Too many things on the menu look like crap, smell like crap, and taste like crap. I threw up in my mouth a little when they brought me my food. The center of my steak was so frozen it started singing "Let It Go." The food sucked. The service sucked. Everything sucked. Wild horses couldn\'t drag me back here.'
        ]);

        Review::create([
            'meal_id' => 25,
            'user_id' => 7,
            'stars' => 2,
            'comment' => 'This place was just ok. Some of my favorite dishes are no longer available. Overhyped. The burger was overcooked. I heard a rumor that the vegetarian dishes are prepared alongside the meat. I gave this place two stars because I was feeling extra generous.'
        ]);

        Review::create([
            'meal_id' => 26,
            'user_id' => 11,
            'stars' => 3,
            'comment' => 'This place was just ok. The tofu dish tasted spongy and a bit bland. The service wasn\'t that good and the waitress was tired. 3 stars.'
        ]);

        Review::create([
            'meal_id' => 27,
            'user_id' => 19,
            'stars' => 5,
            'comment' => 'This is one of my favorite places. The food was cooked to perfection. The decor was unique and incredible. Easily earned their 5 stars!'
        ]);

        Review::create([
            'meal_id' => 28,
            'user_id' => 15,
            'stars' => 4,
            'comment' => 'Decent place. After my meal, I was knocked into a food coma. This was one of the best mouth-watering steaks I\'ve had grace my taste buds in a long time. It failed to meet the 5-star experience because the waiter made a pass at me. So gross.'
        ]);

        Review::create([
            'meal_id' => 1,
            'user_id' => 24,
            'stars' => 4,
            'comment' => 'This place had a lot of heart. The service was good for the most part but the waitress was a bit rude. I was happy to see how clean everything was. After my meal, I was knocked into a food coma. 4 stars.'
        ]);

        Review::create([
            'meal_id' => 2,
            'user_id' => 23,
            'stars' => 5,
            'comment' => 'Best experience ever! Make sure to save room for dessert, because that was the best part of the meal! This was one of the best mouth-watering burgers I\'ve had grace my taste buds in a long time. Everything I tried was bursting with flavor. I was happy to see how clean everything was. This is definitely a spot I\'ll be frequenting.'
        ]);

        Review::create([
            'meal_id' => 3,
            'user_id' => 22,
            'stars' => 5,
            'comment' => 'My taste buds are still singing from our last visit! The experience was heavenly as I was served a meal fit for God himself. The waiter was prompt and polite. I was happy to see how clean everything was. I\'d give more than 5 stars if I could!'
        ]);

        Review::create([
            'meal_id' => 4,
            'user_id' => 21,
            'stars' => 5,
            'comment' => 'I\'ve got a fetish for good food and this place gets me hot! The appetizers must be sprinkled with crack because I just craved for more and more. I found the ambiance to be very charming. I\'m definitely coming back for more!'
        ]);

        Review::create([
            'meal_id' => 5,
            'user_id' => 20,
            'stars' => 5,
            'comment' => 'I\'ve got a fetish for good food and this place gets me hot! Everything was just so yummy. Everything from the starters to the entrees to the desserts meshed perfectly with my flavor-profile. The decor was unique and incredible. They got a new customer for life!'
        ]);

        Review::create([
            'meal_id' => 6,
            'user_id' => 19,
            'stars' => 4,
            'comment' => 'This place was nearby and I decided to check it out. After my meal, I was knocked into a food coma. The ambiance gives off an earthy feel-good vibe. Everything was just so yummy. It could have been perfect, but the waiter had really bad body odor.'
        ]);

        Review::create([
            'meal_id' => 7,
            'user_id' => 18,
            'stars' => 5,
            'comment' => 'I stumbled on this undiscovered gem right in our neighbourhood. Make sure to save room for dessert, because that was the best part of the meal! The decor was unique and incredible. This was one of the best mouth-watering steaks I\'ve had grace my taste buds in a long time. I\'m definitely coming back for more!'
        ]);

        Review::create([
            'meal_id' => 8,
            'user_id' => 17,
            'stars' => 4,
            'comment' => 'I stumbled on this undiscovered gem right in our neighbourhood. The entree I had was sublime. The service was good for the most part but the waiter was a bit rude. I could see myself being a regular here.'
        ]);

        Review::create([
            'meal_id' => 9,
            'user_id' => 16,
            'stars' => 5,
            'comment' => 'Yummers! The appetizers must be sprinkled with crack because I just craved for more and more. After my meal, I was knocked into a food coma. The decor was unique and incredible. The experience was heavenly as I was served a meal fit for God himself. I would eat here every day if I could afford it!'
        ]);

        Review::create([
            'meal_id' => 10,
            'user_id' => 15,
            'stars' => 5,
            'comment' => 'Yummers! I was happy to see how clean everything was. The desserts must be sprinkled with crack because I just craved for more and more. Everything was simply decadent. I want to hire their decorator to furnish my house. Easily earned their 5 stars!'
        ]);

        Review::create([
            'meal_id' => 11,
            'user_id' => 14,
            'stars' => 5,
            'comment' => 'Oh my God! So awesome! The food was flavorful, savory, and succulent. The waiter was prompt and polite. Easily earned their 5 stars!'
        ]);

        Review::create([
            'meal_id' => 12,
            'user_id' => 13,
            'stars' => 5,
            'comment' => 'Yummers! The food was cooked to perfection. The waiter was prompt and polite. I would eat here every day if I could afford it!'
        ]);

        Review::create([
            'meal_id' => 13,
            'user_id' => 12,
            'stars' => 4,
            'comment' => 'It was much better than I expected. The food was cooked to perfection. The decor was unique and incredible. The waiter did an excellent job. Overall experience: 4 stars.'
        ]);

        Review::create([
            'meal_id' => 14,
            'user_id' => 11,
            'stars' => 2,
            'comment' => 'I had high hopes for this place. Too many things on the menu look like crap, smell like crap, and taste like crap. I heard a rumor that the vegetarian dishes are prepared alongside the meat. The waitress was mediocre at best. Everything tasted either microwaved or straight from a can. They need to get their act together before I set foot in this place again.'
        ]);

        Review::create([
            'meal_id' => 15,
            'user_id' => 10,
            'stars' => 5,
            'comment' => 'It was much better than I expected. Everything from the starters to the entrees to the desserts meshed perfectly with my flavor-profile. After my meal, I was knocked into a food coma. Easily earned their 5 stars!'
        ]);

        Review::create([
            'meal_id' => 16,
            'user_id' => 9,
            'stars' => 5,
            'comment' => 'Yumm-o! The entrees are simply to die for. Everything I tried was bursting with flavor. Make sure to save room for dessert, because that was the best part of the meal! This is definitely a spot I\'ll be frequenting.'
        ]);

        Review::create([
            'meal_id' => 17,
            'user_id' => 8,
            'stars' => 4,
            'comment' => 'I stumbled on this undiscovered gem right in our neighboorhood. Try out the huge selection of incredible appetizers. The service was good for the most part but the waitress was a bit slow. The ambiance gives off an earthy feel-good vibe. The food was cooked to perfection. I could see myself being a regular here.'
        ]);

        Review::create([
            'meal_id' => 18,
            'user_id' => 7,
            'stars' => 5,
            'comment' => 'I\'ve got a fetish for good food and this place gets me hot! The decor was unique and incredible. The food was cooked to perfection. This is definitely a spot I\'ll be frequenting.'
        ]);

        Review::create([
            'meal_id' => 19,
            'user_id' => 6,
            'stars' => 4,
            'comment' => 'I was pleasantly surprised. The entree I had was sublime. I was happy to see how clean everything was. Try out the huge selection of incredible appetizers. 4 stars.'
        ]);

        Review::create([
            'meal_id' => 20,
            'user_id' => 5,
            'stars' => 1,
            'comment' => 'Gross! I heard a rumor that the vegetarian dishes are prepared alongside the meat. This place is very dumpy and in a serious need of a makeover. Too many things on the menu look like crap, smell like crap, and taste like crap. I gave 1 star because I couldn\'t give 0.'
        ]);

        Review::create([
            'meal_id' => 21,
            'user_id' => 4,
            'stars' => 4,
            'comment' => 'I have been here several times before. I found the entrees to be very agreeable to my personal flavor-profile. I want to hire their decorator to furnish my apartment. The service was good for the most part but the waiter was a bit unprofessional. I removed a star because my water glass was dirty.'
        ]);

        Review::create([
            'meal_id' => 22,
            'user_id' => 3,
            'stars' => 2,
            'comment' => 'This place is a waste of calories. This place is very dumpy and in a serious need of a makeover. The tofu dish tasted spongy and a bit bland. Seriously, how difficult is it to get a clean glass around here? Overall experience: 2 stars.'
        ]);

        Review::create([
            'meal_id' => 23,
            'user_id' => 2,
            'stars' => 5,
            'comment' => 'Best experience ever! The entrees are simply to die for. Try out the huge selection of incredible appetizers. The waitress did an excellent job. I would eat here every day if I could afford it!'
        ]);

        Review::create([
            'meal_id' => 24,
            'user_id' => 1,
            'stars' => 5,
            'comment' => 'This is one of my favorite places. This was one of the best mouth-watering burgers I\'ve had grace my taste buds in a long time. The waitress did an excellent job. After my meal, I was knocked into a food coma. This is definitely a spot I\'ll be frequenting.'
        ]);

        Review::create([
            'meal_id' => 25,
            'user_id' => 15,
            'stars' => 4,
            'comment' => 'I have been here several times before. The entree I had was sublime. I want to hire their decorator to furnish my apartment. Try out the huge selection of incredible appetizers. Everything I tried was bursting with flavor. 4 stars of satisfaction.'
        ]);

        Review::create([
            'meal_id' => 26,
            'user_id' => 4,
            'stars' => 4,
            'comment' => 'This place was nearby and I decided to check it out. The waitress was prompt and polite. Try out the huge selection of incredible appetizers. The food was cooked to perfection. I would have rated this higher, but the floors were a little sticky.'
        ]);

        Review::create([
            'meal_id' => 27,
            'user_id' => 22,
            'stars' => 3,
            'comment' => 'Decent place. Some of my favorite dishes are no longer available. The food was all right but seriously lacked presentation. There were a lot of interesting decorations on the walls. Might be back. Time will tell.'
        ]);

        Review::create([
            'meal_id' => 28,
            'user_id' => 16,
            'stars' => 4,
            'comment' => 'This place had a lot of heart. The food was cooked to perfection. The waiter was prompt and polite. The ambiance gives off an earthy feel-good vibe. It failed to meet the 5-star experience because my wine glass was dirty.'
        ]);

        Review::create([
            'meal_id' => 1,
            'user_id' => 11,
            'stars' => 1,
            'comment' => 'I can summarize my visit in one word: Lousy. Overhyped. My shoes were stained with rat droppings after leaving this place. This food will start the zombie apocalypse. Stay away!'
        ]);

        Review::create([
            'meal_id' => 1,
            'user_id' => 19,
            'stars' => 2,
            'comment' => 'Lame. I shouldn\'t have to pay good money to be served vegetables from a can. The service wasn\'t that good and the waiter was clueless. I found the entrees to not be very agreeable to my personal flavor-profile. Overall experience: 2 stars.'
        ]);

        Review::create([
            'meal_id' => 5,
            'user_id' => 11,
            'stars' => 5,
            'comment' => 'This is one of my favorite places. This was one of the best mouth-watering burgers I\'ve had grace my taste buds in a long time. The waitress did an excellent job. After my meal, I was knocked into a food coma. This is definitely a spot I\'ll be frequenting.'
        ]);
    }
}