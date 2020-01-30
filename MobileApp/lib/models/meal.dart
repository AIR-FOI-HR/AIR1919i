import 'dart:convert';

List<Meal> mealFromJson(String str) => new List<Meal>.from(json.decode(str).map((x) => Meal.fromJson(x)));

String mealToJson(List<Meal> data) => json.encode(new List<dynamic>.from(data.map((x) => x.toJson())));

class Meal {
    int id;
    String name;
    String description;
    DateTime createdAt;
    DateTime updatedAt;

    Meal({
      this.id,
      this.name,
      this.description,
      this.createdAt,
      this.updatedAt,
    });

    factory Meal.fromJson(Map<String, dynamic> json) => new Meal(
      id: json["id"],
      name: json["name"],
      description: json["description"],
      createdAt: DateTime.parse(json["created_at"]),
      updatedAt: DateTime.parse(json["updated_at"])
    );

    Map<String, dynamic> toJson() => {
      "id": id,
      "name": name,
      "description": description,
      "created_at": createdAt.toIso8601String(),
      "updated_at": updatedAt.toIso8601String()
    };
}