import React, { useState } from 'react';
import { View, Text, StyleSheet, Alert } from 'react-native';
import { ListItem, Button, Icon } from '@rneui/themed';
import { useNavigation } from '@react-navigation/native';
import AsyncStorage from '@react-native-async-storage/async-storage';

import bcryptjs from 'bcryptjs';

const RegistrationScreen = () => {
  const navigation = useNavigation();
  
  const [userName, setUserName] = useState('');
  const [userFullName, setUserFullName] = useState('');
  const [userEmail, setUserEmail] = useState('');
  const [userPassword, setUserPassword] = useState('');
  
  const registerUser = async () => {
    // Basic validation
    if (!userEmail.includes('@')) {
      Alert.alert('Invalid Email', 'Please enter a valid email address');
      return;
    }
    if (userPassword.length < 8) {
      Alert.alert('Weak Password', 'Password must be at least 8 characters long');
      return;
    }
  
    
    // Prepare user data
    const userData = {
      username: userName,
      fullName: userFullName,
      email: userEmail,
      password: userPassword
    };
  
    try {


      // Make API call to register user
      const response = await fetch("http://192.168.1.4/InScentTiveWeb/api/users/create", {
        method: 'POST',
        headers: { 
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: JSON.stringify(userData),
      });
      console.log(userData);
      // Check if registration was successful
      if (response.ok) {
        Alert.alert('Registration Successful', 'You can now log in using your credentials.');
        navigation.navigate('LoginScreen');
      } else {
        // Handle non-JSON response
        const errorText = await response.text();
        Alert.alert('Registration Failed', errorText || 'An error occurred while registering. Please try again.');
      }
    } catch (error) {
      console.error('Error registering user:', error);
      Alert.alert('Registration Failed', 'An error occurred while registering. Please try again.');
    }
  };
  

  return (
    <View style={styles.container}>
      <ListItem bottomDivider>
        <ListItem.Content>
          <ListItem.Title>USERNAME</ListItem.Title>
        </ListItem.Content>
        <ListItem.Input
          placeholder="Enter UserName"
          onChangeText={setUserName}
          value={userName}
        />
      </ListItem>

      <ListItem bottomDivider>
        <ListItem.Content>
          <ListItem.Title>USER FULL NAME</ListItem.Title>
        </ListItem.Content>
        <ListItem.Input
          placeholder="Enter User Full Name"
          onChangeText={setUserFullName}
          value={userFullName}
        />
      </ListItem>

      <ListItem bottomDivider>
        <ListItem.Content>
          <ListItem.Title>USER EMAIL</ListItem.Title>
        </ListItem.Content>
        <ListItem.Input
          placeholder="Enter User Email"
          onChangeText={setUserEmail}
          value={userEmail}
        />
      </ListItem>

      <ListItem bottomDivider>
        <ListItem.Content>
          <ListItem.Title>USER PASSWORD</ListItem.Title>
        </ListItem.Content>
        <ListItem.Input
          placeholder="Enter User Password"
          onChangeText={setUserPassword}
          value={userPassword}
          secureTextEntry
        />
      </ListItem>

      <Button
        onPress={registerUser}
        title="Register"
        type="solid"
        containerStyle={{
          marginHorizontal: 16,
          marginVertical: 8,
          borderRadius: 8,
        }}
        icon={<Icon name="plus" type="font-awesome" color="white" />}
      />
      <Text
        style={styles.textRegister}
        onPress={() => navigation.navigate('LoginScreen')}
      >
        Already have an account? Login
      </Text>
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    paddingTop: 30,
    paddingVertical: 8,
    paddingStart: 10,
  },
  textRegister: {
    textAlign: 'center',
    color: 'blue',
    marginVertical: 10,
  },
});

export default RegistrationScreen;
