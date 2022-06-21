import "./Item02.css";

const Item = (props) => {
  const { title, info } = props;
  const showAll = () => {
    alert(JSON.stringify(props, null, 5));
  };
  const showTitle = () => {
    alert(props.title);
  };
  return (
    <div className="single">
      <h1>{title}</h1>
      <h3>{info}</h3>
      <div>
        <button className="buteczek" onClick={showAll}>
          show all props
        </button>
        <button className="buteczek" onClick={showTitle}>
          show title
        </button>
      </div>
    </div>
  );
};

export default Item;
