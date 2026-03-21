# Quotes and Quotes and Quotes

A RESTful API for managing quotes, authors, and categories. Built with PHP and PostgreSQL.

## Demo

Available at [https://quotes-and-quotes-and-quotes.onrender.com](https://quotes-and-quotes-and-quotes.onrender.com)

## Setup

1. Clone the repo
2. Copy `env.example` to `.env` and fill in your database credentials
3. Run `docker compose up`

## API Endpoints

### GET Requests

#### Quotes

| Endpoint | Response |
|----------|----------|
| `/api/quotes/` | All quotes |
| `/api/quotes/?id={id}` | A single quote |
| `/api/quotes/?author_id={id}` | All quotes from specified author |
| `/api/quotes/?category_id={id}` | All quotes in specified category |
| `/api/quotes/?author_id={id}&category_id={id}` | All quotes from specified author and category |

If no quotes found: `{ "message": "No Quotes Found" }`

#### Authors
 
| Endpoint | Response                     | 
|----------|------------------------------|
| `/api/authors/` | All authors (id, author)     |
| `/api/authors/?id={id}` | A single author (id, author) | 


If no authors found: `{ "message": "author_id Not Found" }`
 
#### Categories
 
| Endpoint | Response                           |
|----------|------------------------------------|
| `/api/categories/` | All categories (id, category)      |
| `/api/categories/?id={id}` | A single category (id, category)   |

If no categories found: `{ "message": "category_id Not Found" }`

### POST Requests

| Endpoint | Required Fields | Response |
|----------|----------------|----------| 
| `/api/quotes/` | quote, author_id, category_id | Created quote (id, quote, author_id, category_id) |
| `/api/authors/` | author | Created author (id, author) | 
| `/api/categories/` | category | Created category (id, category) |

- If author_id does not exist: `{ "message": "author_id Not Found" }`
- If category_id does not exist: `{ "message": "category_id Not Found" }`

- If missing required fields: `{ "message": "Missing Required Parameters" }`

### PUT Requests

| Endpoint | Required Fields | Response |
|----------|----------------|----------|
| `/api/quotes/` | id, quote, author_id, category_id | Updated quote (id, quote, author_id, category_id) |
| `/api/authors/` | id, author | Updated author (id, author) |
| `/api/categories/` | id, category | Updated category (id, category) |

- If author_id does not exist: `{ "message": "author_id Not Found" }`
- If category_id does not exist: `{ "message": "category_id Not Found" }`
- If no quotes found to update: `{ "message": "No Quotes Found" }`
- If missing required fields (except id): `{ "message": "Missing Required Parameters" }`

### DELETE Requests

| Endpoint | Required Fields | Response |
|----------|----------------|----------|
| `/api/quotes/` | id | Deleted quote id |
| `/api/authors/` | id | Deleted author id |
| `/api/categories/` | id | Deleted category id |

- If no quotes found to delete: `{ "message": "No Quotes Found" }`

## Technologies

- PHP 8.4
- PostgreSQL
- Apache
- Docker
