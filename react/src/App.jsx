import React, { useState, useEffect } from "react";
import "./App.css";
function App() {
    const [clicks, setClicks] = useState(0);
    const baseURL = "http://localhost/api/tally";

    useEffect(() => {
        async function fetchData() {
            try {
                const response = await fetch(baseURL);
                const data = await response.json();
                setClicks(data.clicks);
            } catch (error) {
                console.error(error);
            }
        }
        fetchData();
    }, []);

    return (
        <div className="container">
            <div className="counter">{clicks}</div>
            <button
                className="increment-button"
                onClick={async () => {
                    try {
                        const response = await fetch(baseURL, {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                        });
                        const data = await response.json();
                        setClicks(data.clicks);
                    } catch (error) {
                        console.error(error);
                    }
                }}
            >
                Increment
            </button>
        </div>
    );
}

export default App;
