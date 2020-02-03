import 'dart:convert';

List<Meal> mealFromJson(String str) => new List<Meal>.from(json.decode(str).map((x) => Meal.fromJson(x)));

String mealToJson(List<Meal> data) => json.encode(new List<dynamic>.from(data.map((x) => x.toJson())));

class Meal {
    int id;
    String price;
    String name;
    String description;
    String img;
    String userFavorites;
    String stars;
    DateTime createdAt;
    DateTime updatedAt;

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