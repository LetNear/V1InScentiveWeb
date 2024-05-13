import * as React from "react";
import { NavigationContainer } from "@react-navigation/native";
import { createNativeStackNavigator } from "@react-navigation/native-stack";

import LoginScreen from "./src/views/components/screens/LoginScreen";
import RegistrationScreen from "./src/views/components/screens/RegistrationScreen";
import ButtomNav from "./src/views/components/screens/ButtomNav";
import HomeScreen from "./src/views/components/screens/HomeScreen";
import ProductInfo from "./src/views/components/screens/ProductInfo";
const Stack = createNativeStackNavigator();

function App() {
  return (
    <NavigationContainer>
      <Stack.Navigator
        initialRouteName="RegistrationScreen"
        screenOptions={{
          headerShown: false,
        }}
      >
        <Stack.Screen
          name="RegistrationScreen"
          component={RegistrationScreen}
        />
        <Stack.Screen name="LoginScreen" component={LoginScreen} />
        <Stack.Screen name="ButtomNav" component={ButtomNav} />
        <Stack.Screen name="HomeScreen" component={HomeScreen} />
        <Stack.Screen name="ProductInfo" component={ProductInfo} />


      </Stack.Navigator>
    </NavigationContainer>
  );
}

export default App;
