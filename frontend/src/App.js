import Item02 from "./components/Item";
import "./app02.css";
const App = () => {
    fetch("http://budjet.pawelek2111.ct8.pl/login.php")
    .then(res=>res.json())
    .then(res=>console.log(res))

  return (
    <div className="container">
      <h1>02: PROPS-Y W KOMPONENCIE FUNKCYJNYM</h1>
      <div className="comps">
        <Item02 title="ReactJS" info="easy" />
        <Item02 title="ExpressJS" info="lightweight" />
        <Item02 title="NextJS" info="serverside" />
      </div>
    </div>
  );
};

export default App;
