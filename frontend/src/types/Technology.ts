import State from "@/types/State";
import Type from "@/types/Type";


type Technology = {
    id: number|null;
    name: string;
    type_id: number|null;
    state_id: number|null;
    description: string;
    description_classification: string;
    status: string;
    type?: Type;
    state?: State;
};
  
export default Technology;