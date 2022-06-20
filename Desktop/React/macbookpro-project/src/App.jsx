import { useState } from "react";

const options = {
  processor: [
    {
      name: "Processeur Intel Core i7 hexacœur de 9e génération à 2,6 GHz (Turbo Boost jusqu’à 4,5 GHz)",
      price: 0,
    },
    {
      name: "Processeur Intel Core i9 8 cœurs de 9e génération à 2,4 GHz (Turbo Boost jusqu’à 5 GHz)",
      price: 360,
    },
  ],
  memory: [
    { name: "16 Go de mémoire DDR4 à 2 400 MHz", price: 0 },
    { name: "32 Go de mémoire DDR4 à 2 400 MHz", price: 480 },
  ],
  gpu: [
    { name: "Radeon Pro 555X avec 4 Go de mémoire GDDR5", price: 0 },
    { name: "Radeon Pro 560X avec 4 Go de mémoire GDDR5", price: 120 },
  ],
  storage: [
    { name: "SSD de 256 Go", price: 0 },
    { name: "SSD de 512 Go", price: 240 },
    { name: "SSD de 1 To", price: 480 },
    { name: "SSD de 2 To", price: 960 },
    { name: "SSD de 4 To", price: 1920 },
  ],
  finalCut: {
    name: "Final Cut Pro X",
    price: 329.99,
  },
  logicPro: {
    name: "Logic Pro X",
    price: 229.99,
  },
};

export function App() {
  const [processor, setProcessor] = useState(0);
  const [memory, setMemory] = useState(0);
  const [gpu, setGpu] = useState(0);
  const [storage, setStorage] = useState(0);
  const [finalCut, setFinalCut] = useState(false);
  const [logicPro, setLogicPro] = useState(false);

  const processorOptionPrice = options.processor[processor].price;
  const memoryOptionPrice = options.memory[memory].price;
  const gpuOptionPrice = options.gpu[gpu].price;
  const storageOptionPrice = options.storage[storage].price;

  const total =
    2699 +
    processorOptionPrice +
    memoryOptionPrice +
    gpuOptionPrice +
    storageOptionPrice;

  return (
    <div className="App">
      {/* processor */}
      {options.processor.map((option, index) => {
        Choice(option.name);
      })}
      {/* memory */}
      {options.memory.map((option, index) => {
        let className = "option";
        if (memory === index) {
          className += " selected";
        }

        return (
          <div
            key={index}
            className={className}
            onClick={() => {
              setMemory(index);
            }}
          >
            {option.name}
          </div>
        );
      })}
      {/* GPU */}
      {options.gpu.map((option, index) => {
        let className = "option";
        if (gpu === index) {
          className += " selected";
        }

        return (
          <div
            key={index}
            className={className}
            onClick={() => {
              setGpu(index);
            }}
          >
            {option.name}
          </div>
        );
      })}
      {/* storage */}
      {options.storage.map((option, index) => {
        let className = "option";
        if (storage === index) {
          className += " selected";
        }

        return (
          <div
            key={index}
            className={className}
            onClick={() => {
              setStorage(index);
            }}
          >
            {option.name}
          </div>
        );
      })}
      <div>Total: {total} €</div>
    </div>
  );
}

function Choice({ name }) {
  let className = "option";
  if (processor === index) {
    className += " selected";
  }

  return (
    <div
      key={index}
      className={className}
      onClick={() => {
        onSelect;
      }}
    >
      {name}
    </div>
  );
}
