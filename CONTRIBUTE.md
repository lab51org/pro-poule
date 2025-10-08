# 🤝 Contribution Guide — PRO POULE

Thank you for contributing to **PRO POULE**! ❤️  
This project is **open source**, and every contribution — big or small — is truly appreciated.  
This guide will help you contribute cleanly and consistently with the project’s structure and code style.

---

## 🧭 How to Contribute

1️⃣ **Fork the repository**

```
git clone https://github.com/lab51org/pro-poule.git
```

2️⃣ **Create a new branch for your feature or fix**

```
git checkout -b feature/your-feature-name
```

3️⃣ **Make your changes in your development environment**

4️⃣ **Verify everything works correctly**

```
php artisan test
npm run build
```

5️⃣ **Commit your changes following the conventions (see below)**

6️⃣ **Push your branch**

```
git push origin feature/your-feature-name
```

7️⃣ **Open a Pull Request (PR)**

Clearly describe what you changed and why.
I will review your PR before merging.

---

## Other important coding stuffs

🧱 Commit Conventions
We follow the Conventional Commits standard for clarity and automated changelog generation.

Format: <type>(optional scope): short description

Use common types below

| Type   | When to use                                      | 
|:-------|:-------------------------------------------------|
| feat   | For new features                                 |
| fix	   | For bug fixes                                    |
| docs	  | For documentation updates                        |
| style	 | For code formatting and style-only changes       |
| test   | For new or updated tests                         |
| chore  | 	For maintenance, scripts, or dependency updates |  
| typo   | For typos and grammar and orthographic errors    |

Examples:

```
git commit -m "feat(players): added ability for users to register for tournaments online"
git commit -m "fix(poule): fixed randomization bug in pool generation"
```

🧩 Code Style

🐘 PHP / Laravel

Follow `PSR-12` coding standards

Use clear, descriptive names for classes, methods, and variables

Keep Controllers focused on a single responsibility

Move complex logic into Services, Actions, or Jobs

Use singular Eloquent Models (Player, Game, Club)

All PHP files must end with a blank line

⚛️ JavaScript / Vue (or React)
Use camelCase for variables and functions

Avoid global functions and code duplication

Keep components small, modular, and reusable

🧪 Testing & Quality Assurance
Before opening a PR, make sure that:

✅ **All tests pass (`php artisan test`)**

✅ **Code complies with linting rules (`composer lint` if available)**

✅ **New features include appropriate unit or integration tests**

🧱 **Laravel Naming Standards**

| Type       | Convention                  | Example                                 |
|:-----------|:----------------------------|:----------------------------------------|
| Model      | Singular, PascalCase        | Player, Game                            |
| Controller | 	PascalCase + "Controller"	 | PlayerController                        |
| Migration  | 	snake_case + timestamp     | 	2025_10_07_123456_create_players_table |
| Route      | 	kebab-case                 | player-details                          |
| Blade View | 	snake_case                 | 	player_list.blade.php                  |

🐛 **Reporting Bugs or Issues**

If you encounter a bug:

* Check if it’s already reported.
* Open a new Issue including:
* A clear description of the problem
* Steps to reproduce it
* Expected vs. actual behavior
* Screenshots (if useful)
* Laravel, PHP, and browser versions

🔒 **Security Policy**
If you discover a security vulnerability, do not open a public issue.
Instead, email the maintainer directly at md@lab51.org.
The issue will be handled responsibly and confidentially.

💬 **Communication Guidelines**
Be respectful and constructive in discussions

Avoid aggressive or dismissive language

Remember: code reviews and suggestions are opportunities to learn and improve together 💡

❤️ **Acknowledgments**
Thanks for helping improve PRO POULE!
Every commit, fix, or suggestion moves us closer to a complete and powerful pétanque tournament platform 🏆

> © 2025 Matteo Dalmasso — [md@lab51.org](mailto:md@lab51.org)
