import React, { useState, useEffect } from "react";
import "./App.css";
function App() {
    const [clicks, setClicks] = useState(0);
    const [isLoading, setIsLoading] = useState(false);
    const baseURL = "http://localhost/api/click";

    useEffect(() => {
        fetchData();
    }, []);

    async function fetchData() {
        try {
            const response = await fetch(baseURL);
            const data = await response.json();
            setClicks(data.data.attributes.clicks);
        } catch (error) {
            console.error(error);
        }
    }

    async function ButtonHandler() {
        setIsLoading(true); // Disable the button
        try {
            const response = await fetch(baseURL, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
            });
            const data = await response.json();
            setClicks(data.data.attributes.clicks);
            setIsLoading(false);
        } catch (error) {
            console.error(error);
            setIsLoading(false);
        }
    }

    return (
        <div className="container">
            <div className="counter">{clicks}</div>
            <>
                {isLoading ? (
                    <div className="spinner"></div>
                ) : (
                    <button
                        disabled={isLoading}
                        className="increment-button"
                        onClick={async () => ButtonHandler()}
                    >
                        Increment
                    </button>
                )}
            </>
        </div>
    );
}

export default App;
