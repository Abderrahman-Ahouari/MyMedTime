
 

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password TEXT NOT NULL,
    role VARCHAR(20) CHECK (role IN ('patient', 'medecin', 'admin')),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
); 

CREATE TABLE patients (
    id SERIAL PRIMARY KEY,
    user_id INT UNIQUE NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    date_of_birth DATE,
    phone VARCHAR(15)
);

CREATE TABLE doctors (
    id SERIAL PRIMARY KEY,
    user_id INT UNIQUE NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    specialty VARCHAR(100),
    available_days TEXT
);

CREATE TABLE appointments (
    id SERIAL PRIMARY KEY,
    patient_id INT NOT NULL REFERENCES patients(id) ON DELETE CASCADE,
    medecin_id INT NOT NULL REFERENCES doctors(id) ON DELETE CASCADE,
    appointment_date TIMESTAMP NOT NULL,
    status VARCHAR(20) CHECK (status IN ('pending', 'confirmed', 'cancelled')) DEFAULT 'pending',
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


