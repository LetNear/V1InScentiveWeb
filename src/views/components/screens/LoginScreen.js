import React, { useState, useEffect, useContext } from "react";
import { View, Text, StyleSheet, Alert, ActivityIndicator } from "react-native";
import { useNavigation } from "@react-navigation/native";
import { Button, Input, Icon } from "@rneui/themed";
import AsyncStorage from "@react-native-async-storage/async-storage";
import { compare } from "bcryptjs";
import Loader from "../Loader";
import { AuthContext } from "../AuthContext";

const LoginScreen = () => {
  const navigation = useNavigation();

  const [userEmail, setUserEmail] = useState("");
  const [userPassword, setUserPassword] = useState("");
  const [loading, setLoading] = useState(false); // State to control the loading indicator
  const { setUser } = useContext(AuthContext);

  const handleLogin = async () => {
    try {
      setLoading(true); // Start the loading indicator

      const params = new URLSearchParams();

      params.append("email", userEmail);

      const url = new URL("http://172.21.16.1/InScentTiveWeb/api/user/email");
      url.search = params;
      // Make the login request to the server
      const response = await fetch(url, {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
        },
      });

      // Check if the response is successful (status code 200)
      if (response.ok) {
        const userData = (await response.json()).data;
        compare(userPassword, userData.password, function (err, result) {
          if (err) {
            console.log("prompt: Unexpected error");
          }

          if (result) {
            Alert.alert("Login Successful", "Welcome back!");
            setUser(userData);
            navigation.navigate("HomeScreen");
          } else {
            console.log("prompt: invalid credentials");
          }
        });
      } else {
        // Handle non-successful response (e.g., invalid credentials)
        const errorText = await response.text();
        Alert.alert(
          "Login Failed",
          errorText || "An error occurred while logging in. Please try again."
        );
      }
    } catch (error) {
      console.error("Error logging in:", error);
      Alert.alert(
        "Error",
        "An error occurred while logging in. Please try again later."
      );
    } finally {
      setLoading(false); // Stop the loading indicator
    }
  };

  return (
    <View style={styles.container}>
      <Input
        label="Email Address"
        iconName="envelope"
        placeholder="Enter your Email Address"
        onChangeText={setUserEmail}
        value={userEmail}
      />
      <Input
        label="Password"
        iconName="key"
        password
        placeholder="Enter your Password"
        onChangeText={setUserPassword}
        value={userPassword}
      />
      <Button
        onPress={handleLogin}
        title="Login"
        type="solid"
        containerStyle={{
          marginHorizontal: 16,
          marginVertical: 8,
          borderRadius: 8,
        }}
        icon={<Icon name="sign-in" type="font-awesome" color="white" />}
      />
      <Text
        style={styles.textRegister}
        onPress={() => navigation.navigate("RegistrationScreen")}
      >
        Don't have an account? Register
      </Text>
      <Loader visible={loading} />
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: "#fff",
    justifyContent: "center",
    paddingHorizontal: 16,
  },
  textRegister: {
    textAlign: "center",
    color: "blue",
    marginVertical: 10,
  },
  loaderContainer: {
    position: "absolute",
    top: 0,
    left: 0,
    right: 0,
    bottom: 0,
    justifyContent: "center",
    alignItems: "center",
    backgroundColor: "rgba(0, 0, 0, 0.5)",
    zIndex: 1,
  },
});

export default LoginScreen;
