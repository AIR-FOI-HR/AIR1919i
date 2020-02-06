import 'dart:convert';

// Cast Meals to List from JSON
List<Meal> mealFromJson(String str) => new List<Meal>.from(json.decode(str).map((x) => Meal.fromJson(x)));

// Cast Meals to JSON from List
String mealToJson(List<Meal> data) => json.encode(new List<dynamic>.from(data.map((x) => x.toJson())));

// Define class Meal
class Meal {
    int id;
    String price;
    String name;
    String description;
    String img;
    String userFavorites;
    int stars;
    DateTime createdAt;
    DateTime updatedAt;

    // Instantiate Meal object
    factory Meal.fromJson(Map<String, dynamic> json) => new Meal(
      id: json["id"],
      price: json["price"],
      name: json["name"],
      description: json["description"],
      img: json["img"],
      userFavorites: json["user_favorites"],
      stars: json["stars"],
      createdAt: DateTime.parse(json["created_at"]),
      updatedAt: DateTime.parse(json["updated_at"])
    );

    // Define constructor
    Meal({
      this.id,
      this.price,
      this.name,
      this.description,
      this.img,
      this.userFavorites,
      this.stars,
      this.createdAt,
      this.updatedAt,
    });

    // Cast the Meal to JSON
    Map<String, dynamic> toJson() => {
      "id": id,
      "price": price,
      "name": name,
      "description": description,
      "description": img,
      "favorites": userFavorites,
      "created_at": createdAt.toIso8601String(),
      "updated_at": updatedAt.toIso8601String()
    };
}