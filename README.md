# <a name="no-link"></a>Laravel Airport API

API for the Flight System. Database agnostic but I've used PostgreSQL.

## <a name="no-link"></a>Technologies Used

- **Laravel**

Laravel is a PHP web application framework known for its elegant syntax and developer-friendly features. It follows the MVC pattern and provides powerful tools for building robust web applications.

- **PostgreSQL**

PostgreSQL is a RDBMS known for its reliability, robust feature set, and extensibility. It is highly regarded for its ability to handle complex queries, manage high concurrency, and provide advanced data types and indexing capabilities. 

## Entities

All IDs are UUIDv4.

### 1. **Airport:**
- id (PK)
- name
- city
- country

### 2. **Airlines**
- id (PK)
- name
- code

### 3. **Flights**
- id (PK)
- airline_id (FK to Airlines)
- departure_airport_id (FK to Airports)
- arrival_airport_id (FK to Airports)
- departure_time
- arrival_time

### 4. **Passengers**
- id (PK)
- name
- passport_number

### 5. **Tickets**
- id (PK)
- passenger_id (FK to Passengers)
- flight_id (FK to Flights)
- seat_number
- ticket_price

### 6. **Baggage**
- id (PK)
- passenger_id (FK to Passengers)
- flight_id (FK to Flights)
- weight
- is_checked

### 7. **Boarding Passes**
- id (PK)
- passenger_id (FK to Passengers)
- flight_id (FK to Flights)
- seat_number
- gate_number
- boarding_time
